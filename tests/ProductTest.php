<?php

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_getId_returns_correct_id()
    {
        $product = new Product(1, 'Test Product', 'Description', 99.99, false);
        $this->assertEquals(1, $product->getId());
    }

    public function test_getId_handles_large_integers()
    {
        $largeId = PHP_INT_MAX;
        $product = new Product($largeId, 'Test Product', 'Description', 99.99, false);
        $this->assertEquals($largeId, $product->getId());
    }

    // Create product with valid parameters and verify all getters return correct values
    public function test_product_getters_return_correct_values(): void
    {
        $id = 1;
        $name = "Test Product";
        $description = "Test Description";
        $price = 99.99;
        $checked = false;

        $product = new Product($id, $name, $description, $price, $checked);

        $this->assertEquals($id, $product->getId());
        $this->assertEquals($name, $product->getName());
        $this->assertEquals($description, $product->getDescription());
        $this->assertEquals($price, $product->getPrice());
        $this->assertEquals($checked, $product->isChecked());
    }

    // Create product with very large integer ID and verify id getter
    public function test_product_with_large_integer_id(): void
    {
        $largeId = PHP_INT_MAX;
        $product = new Product(
            $largeId,
            "Test Product",
            "Test Description",
            99.99,
            false
        );

        $this->assertEquals($largeId, $product->getId());
    }
}