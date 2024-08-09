<?php 
use Framework\Database;
use Framework\Validation;

$config = require basePath("config/db.php");
$db = new Database($config);

// Get the ID from the query string
$id = $_GET['id'] ?? '';


if (!$id) {
    // Handle the error, for example:
    echo "Listing ID is missing or invalid.";
    exit;
}

// Fetch the listing from the database
$params = [
    'id' => $id
];

$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

if (!$listing) {
    echo "Listing not found.";
    exit;
}

// Define allowed fields for updating
$allowedFields = [
    'title', 
    'description', 
    'salary', 
    'tags', 
    'company', 
    'country',  
    'email', 
    'requirements'
];

// Filter and sanitize POST data
$updatedvalues = array_intersect_key($_POST, array_flip($allowedFields));
$updatedvalues = array_map('sanitize', $updatedvalues);

// Validate required fields
$requiredFields = ['title', 'description', 'email'];
$errors = [];

foreach ($requiredFields as $field) {
    if (empty($updatedvalues[$field]) || !Validation::string($updatedvalues[$field])) {
        $errors[$field] = ucfirst($field) . " is required";
    }
}

if (!empty($errors)) {
    // Reload view with errors
    loadView('listings/edit', [
        'errors' => $errors,
        'listing' => $listing
    ]);
    exit;
} else {
    // Prepare the update query
    $updateFields = [];

    foreach (array_keys($updatedvalues) as $field) {
        $updateFields[] = "{$field} = :{$field}";
    }

    $updateFields = implode(', ', $updateFields);
    $updateQuery = "UPDATE listings SET $updateFields WHERE id = :id";

    // Include the ID in the update parameters
    $updatedvalues['id'] = $id;
    
    // Execute the update query
    $db->query($updateQuery, $updatedvalues);

    // Redirect to the updated listing page
    header('Location: /listing?id=' . urlencode($id));
    exit;
}

// Reload view with the current listing data
loadView('listings/edit', [
    'listing' => $listing
]);
