<?php
namespace Core;

use PDO;

class Model {
    protected $db;

    public function __construct() {
        // Initialize and set up a sqlite database
        $this->db = new PDO('sqlite:database.sqlite');

    }
}
