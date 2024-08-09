<?php 

// return [
//   '/' => 'controllers/home.php',
//   '/listings' => 'controllers/listings/index.php',
//   '/listings/create' => 'controllers/listings/create.php',
//   '404' => 'controllers/error/404.php'
  
//   ];


  $router->get('/','controllers/home.php');
  $router->get('/listings','controllers/listings/index.php');
  $router->get('/listings/create','controllers/listings/create.php');
  $router->get('/listing','controllers/listings/show.php');
  $router->post('/listings','controllers/listings/index.php');

  $router->delete('/listing/destroy','controllers/listings/destory.php'); 


  $router->get('/listing/edit','controllers/listings/edit.php');
  $router->put('/listing/edit','controllers/listings/edit.php');




 

?>