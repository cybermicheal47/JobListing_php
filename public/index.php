<?php
require __DIR__ . "/../vendor/autoload.php";
require '../helpers.php';
// require basePath("Framework/Router.php");
// require basePath("Framework/Database.php");

use Framework\Router;
use Framework\Session;

Session::start();
// inspectandDie(session_status());

// intiate the router
 
$router = new Router();
// get routes
$routes = require basePath('routes.php');

// get current uri and http method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$method = $_SERVER['REQUEST_METHOD'];

//route the request
$router->route($uri,$method)
?>