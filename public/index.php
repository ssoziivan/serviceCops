<?php 
require_once '../core/Router.php';
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/UserController.php';

// Handles requests and routes them(Front Controller)
$router = new Router();

// Define Routes
$router-> get('/','HomeController@index');
$router-> get('/users/profile/{id}','UserController@profile');

// Dispatch Request
$router->dispatch($_SERVER['REQUEST_URI']);