<?php

declare(strict_types=1);

namespace App\Models;

use Core\Model;
use DateMalformedStringException;
use DateTime;
use DateTimeZone;

class ProductsModel extends Model
{
    /**
     * Get example data from the database.
     *
     * @return array<Product>
     */
    public function getProducts(): array
    {
        $result = $this->db->query('SELECT * FROM products')->fetchAll();
        $products = [];

        foreach ($result as $row) {
            $products[] = new Product(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['price'],
                (bool) $row['checked'],
            );
        }

        return $products;
    }


    public function addProduct(string $name, string $description, float $price): void
    {
        $stmt = $this->db->prepare(
            'INSERT INTO products (name, description, price) VALUES (:name, :description, :price)',
        );
        $stmt->execute(compact('name', 'description', 'price'));
    }


    public function deleteProduct(int $id): void
    {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = :id');
        $stmt->execute(compact('id'));
    }


    /**
     * @throws DateMalformedStringException
     */
    public function updateProduct(int $id, string $name, string $description, float $price): void
    {
        $updatedAt = (new DateTime('now', new DateTimeZone('UTC')))->format('Y-m-d H:i:s');

        $stmt = $this->db->prepare(
            'UPDATE products SET name = :name, description = :description, price = :price, updated_at = :updatedAt WHERE id = :id',
        );
        $stmt->execute(compact('id', 'name', 'description', 'price', 'updatedAt'));
    }


    public function toggleChecked(int $id): void
    {
        $stmt = $this->db->prepare('UPDATE products SET checked = NOT checked WHERE id = :id');
        $stmt->execute(compact('id'));
    }


    public function getProductById(int $id): mixed
    {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(compact('id'));

        $row = $stmt->fetch();

        if ($row === false) {
            return null;
        }

        return new Product(
            $row['id'],
            $row['name'],
            $row['description'],
            $row['price'],
            (bool) $row['checked'],
        );
    }
}
