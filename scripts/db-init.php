<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Core\DatabaseInitializer;
use Core\Model;

// Instantiate the Model to get the PDO connection
$model = new Model();
$db = $model->getDb();

// Instantiate the DatabaseInitializer and run the initialization
$initializer = new DatabaseInitializer($db);
$initializer->initialize();

echo "Database initialized successfully.\n";
