<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use Core\Router;

$router = new Router();

// Define routes
$router->add('GET', '/', [new HomeController(), 'index']);
$router->add('GET', '/products', [new ProductController(), 'index']);
$router->add('POST', '/products/add', [new ProductController(), 'add']);
$router->add('GET', '/products/delete/{id}', [new ProductController(), 'delete']);
$router->add('GET', '/products/edit/{id}', [new ProductController(), 'edit']);
$router->add('POST', '/products/edit/{id}', [new ProductController(), 'edit']);
$router->add('GET', '/products/toggleChecked/{id}', [new ProductController(), 'toggleChecked']);

// Dispatch the request
$router->dispatch();
