<?php

declare(strict_types=1);

namespace Core;

use PDO;

class Model
{
    protected PDO $db;


    public function __construct()
    {
        // Initialize and set up a sqlite database
        $this->db = new PDO('sqlite:database.sqlite');
    }
}
