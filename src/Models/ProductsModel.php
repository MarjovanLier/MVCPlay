<?php
namespace App\Models;

use Core\Model;

class ProductsModel extends Model {

    /**
     * Get example data from the database
     *
     * @return array<array-key, array{id: int, name: string, description: string, price: float}>
     */
    public function getExampleData(): array
    {
        return $this->db->query("SELECT * FROM products")->fetchAll();
    }
}
