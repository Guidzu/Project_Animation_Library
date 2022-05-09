<?php

use App\Routing\Router;

require_once '../vendor/autoload.php';

$router = new Router();

$router->addRoute('main','MainController');
$router->addRoute('login','LoginController');
$router->addRoute('contact','ContactController');
$router->addRoute('home','HomeController');
$router->addRoute('addAnimation','AnimationController');
$router->addRoute('logout','LogoutController');

$router->launch();

require_once "../Views/Layout.phtml";