<?php

require_once '../vendor/autoload.php';

use App\Controllers\HomeController;
use Core\Router;

$router = new Router();

// Define routes
$router->add('GET', '/', HomeController::class, 'index');

// Dispatch the request
$router->dispatch();
