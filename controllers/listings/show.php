<?php 
$config = require basePath("config/db.php");
$db = new Database($config);


echo '<pre>';
print_r($_SERVER); // Inspect the server variables to understand the request
echo '</pre>';

$id = $_GET['id'] ?? '';


$params = [
  'id' => $id
];



$listing = $db->query('SELECT * FROM listings WHERE id= :id', $params)->fetch();

loadView('listings/show', [
  'listing' => $listing
]);