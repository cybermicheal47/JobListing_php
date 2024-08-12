<?php 

// return [
//   '/' => 'controllers/home.php',
//   '/listings' => 'controllers/listings/index.php',
//   '/listings/create' => 'controllers/listings/create.php',
//   '404' => 'controllers/error/404.php'
  
//   ];


  $router->get('/','controllers/home.php');
  $router->get('/listings','controllers/listings/index.php');
  $router->get('/listings/create','controllers/listings/create.php', ['auth']);
  $router->get('/listing','controllers/listings/show.php');
  $router->post('/listings','controllers/listings/index.php' , ['auth']);

  $router->delete('/listing/destroy','controllers/listings/destory.php', ['auth']); 


  $router->get('/listing/edit','controllers/listings/edit.php');
  $router->put('/listing/edit','controllers/listings/edit.php' , ['auth']);

  $router->get('/register','controllers/auth/register.php' , ['guest']);
  $router->get('/login','controllers/auth/login.php' , ['guest']);

  $router->post('/register','controllers/auth/register.php', ['guest']);

  
  $router->post('/logout','controllers/auth/logout.php');

  $router-> post('/login','controllers/auth/login.php');



 

?>