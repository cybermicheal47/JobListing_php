<?php

use Framework\Database;
use Framework\Validation;
use Framework\Session;


$config = require basePath("config/db.php");
$db = new Database($config);


if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 
  $email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

// Validation
if (!Validation::email($email)) {
    $errors['email'] = 'Please enter a valid email';
}

if (!Validation::string($password, 6,1000)) {
    $errors['password'] = 'Password must be at least 6 characters';
}

if (!empty($errors)) {
  loadView('authentication/login', [
    'errors' => $errors]);
    exit;
}


//check if the email matches

$params =[
  'email' => $email
];
$user = $db->query("SELECT * FROM   users WHERE email = :email" , $params)->fetch();




if(!$user) {
  $errors['email'] = "Incorrect Credentials";
  loadView('authentication/login', [
    'errors' => $errors]);
    exit;
}

//check for password
if(!password_verify($password, $user['password'])){
  $errors['email'] = "Incorrect Credentials";

  loadView('authentication/login', [
    'errors' => $errors]);
    exit;

}

 // set user session
 Session::set('user',[
  'id' => $user['id'],
'name' => $user['name'],
      'email' => $user['email'],
      'country' => $user['country'], 

] );

header('Location: /');


}



loadView('authentication/login');
