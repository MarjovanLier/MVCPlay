<?php

declare(strict_types=1);

namespace Core;

use PDO;

class Model
{
    protected PDO $db;


    public function __construct()
    {
        $dbPath = __DIR__ . '/../database.sqlite';

        if (!file_exists($dbPath)) {
            $this->db = new PDO('sqlite:' . $dbPath);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $databaseInitializer = new DatabaseInitializer($this->db);
            $databaseInitializer->initialize();
        } else {
            $this->db = new PDO('sqlite:' . $dbPath);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }


    public function getDb(): PDO
    {
        return $this->db;
    }
}
