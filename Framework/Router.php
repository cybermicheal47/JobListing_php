<?php

namespace Framework;



//  $routes = require basePath('routes.php');

// if(array_key_exists($uri,$routes)){
//   require(basePath($routes[$uri]));
// } else {
//   http_response_code(404);
//   require basePath($routes['404']);
// }

use Framework\Middleware\Authorize;



class Router {

  protected $routes = [];

public function registerRoute($method,$uri,$controller,$middleware = []){
  $this->routes[] = [
    'method' => $method,
    'uri' => $uri,
    'controller' => $controller,
    'middleware' => $middleware
  
  ];
}
//add a get route
/**
 * Add a Get Route
 * @param string uri
 * @param string controller
 * return void
 */

public function get ($uri,$controller, $middleware = []){
$this->registerRoute('GET', $uri,$controller,$middleware);
}



/**
 * Add a POST Route
 * @param string uri
 * @param string controller
 * return void
 */

 public function post ($uri,$controller,$middleware = []){
  $this->registerRoute('POST', $uri,$controller,$middleware);
 }



 /**
 * Add a PUT Route
 * @param string uri
 * @param string controller
 * return void
 */

public function put ($uri,$controller,$middleware = []){
  $this->registerRoute('PUT', $uri,$controller,$middleware);
}




/**
 * Add a delete Route
 * @param string uri
 * @param string controller
 * return void
 */

 public function delete ($uri,$controller,$middleware = []){
  $this->registerRoute('DELETE', $uri,$controller,$middleware);
 }



 public function error($httpCode = 404){
  http_response_code($httpCode);
loadView("error/{$httpCode}");
exit;
}



 public function route ($uri,$method){
// Check for method override using _method
if ($method === 'POST' && isset($_POST['_method'])) {
  $method = strtoupper($_POST['_method']);
}


foreach($this->routes as $route){
  if($route['uri'] ===$uri && $route['method'] === $method){

      // Apply middleware before the controller is executed
      foreach ($route['middleware'] as $middleware) {
        (new Authorize())->handle($middleware);
      }

        // Load the controller
    require  basePath("App/" . $route['controller']);
    return;
  } 
}
$this->error();

 }

}






?>