<?php

require_once '../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use Core\Router;

$router = new Router();

// Define routes
$router->add('GET', '/', [new HomeController(), 'index']);
$router->add('GET', '/products', [new ProductController(), 'index']);

// Dispatch the request
$router->dispatch();
