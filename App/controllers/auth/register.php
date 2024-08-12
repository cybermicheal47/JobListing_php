<?php

use Framework\Database;
use Framework\Validation;
use Framework\Session;


$config = require basePath("config/db.php");
$db = new Database($config);


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
 $name = $_POST['name'];
 $email = $_POST['email'];
 $country = $_POST['country'];
 $password = $_POST['password'];
 $passwordConfirmation = $_POST['password_confirmation'];

$errors = [];

if(!Validation::email($email)){
  $errors['email'] = 'Please write a Valid Email';
}

if(!Validation::string($name, 1, 50)){
  $errors['name'] = 'Please  enter a Valid name maximum of 50 characters';
}

if(!Validation::string($password, 6,1000)){
  $errors['password'] = 'Please  enter a Valid password';
}

if(!Validation::match($password,$passwordConfirmation)){
  $errors['password_confirmation'] = ' Your Password do not match';
}



if(!empty($errors)){
  // inspectandDie($errors);
  loadView('authentication/register', [
    'errors' => $errors,
    'user' => [ 
      'name' => $name,
      'email' => $email,
      'country' => $country

    ]
  ] );
  exit;

//check if email exists



} else{

//check if email/user already exists


$params = [
  'email' => $email
];

$userAlreadyExist = $db->query('SELECT * FROM users WHERE email = :email ' , $params)->fetch();

if($userAlreadyExist){
  $errors['email'] = "Email already exist";
  loadView('authentication/register', [
    'errors' => $errors,
    'user' => [ 
      'name' => $name,
      'email' => $email,
      'country' => $country

    ]
  ] );
   exit;
}


//create User

$params = [
'name' => $name,
      'email' => $email,
      'country' => $country,
      'password' => password_hash($password, PASSWORD_DEFAULT)

];


$db->query('INSERT INTO users (name, email,country, password) VALUES (:name, :email, :country, :password)', $params);

//GET NEW USER ID

$userid = $db->conn->lastInsertId();

//set user Session
Session::set('user',[
  'id' => $userid,
'name' => $name,
      'email' => $email,
      'country' => $country,  

] );
// inspectandDie(Session::get('user'));

header('Location: /');

}


}







loadView('authentication/register');
