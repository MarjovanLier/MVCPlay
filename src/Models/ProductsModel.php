<?php
namespace App\Models;

use Core\Model;

class ProductsModel extends Model {
    public function getExampleData() {
        $stmt = $this->db->query("SELECT * FROM example_table");
        return $stmt->fetchAll();
    }
}
