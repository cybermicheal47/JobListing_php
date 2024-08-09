<?php
use Framework\Database;
use Framework\Validation;

$config = require basePath("config/db.php");
$db = new Database($config);

$listings = $db->query('SELECT * FROM listings')->fetchAll();

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $NewlistingData = array_intersect_key($_POST, array_flip($allowedFields));
    $NewlistingData['user_id'] = 2;
    $NewlistingData = array_map('sanitize', $NewlistingData);

    $requiredFields = ['title', 'description', 'email'];
    $errors = [];

    foreach ($requiredFields as $field) {
        if (empty($NewlistingData[$field]) || !Validation::string($NewlistingData[$field])) {
            $errors[$field] = ucfirst($field) . " is required";
        }
    }

    if (!empty($errors)) {
        // Reload view with errors
        loadView('listings/create', [
            'errors' => $errors,
            'listing' => $NewlistingData
        ]);
    } else {
        $fields = [];
        $values = [];

        foreach ($NewlistingData as $field => $value) {
            if ($value === '') {
                $NewlistingData[$field] = null;
            }
            $fields[] = $field;
            $values[] = ':' . $field;
        }

        $fields = implode(", ", $fields);
        $values = implode(", ", $values);

        $query = "INSERT INTO listings ({$fields}) VALUES ({$values})";
        $db->query($query, $NewlistingData);

        header('Location: /listings');
        exit;
    }
}









loadView('listings/index', [
    'listings' => $listings
]);
?>
