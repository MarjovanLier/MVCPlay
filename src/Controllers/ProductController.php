<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use Core\Controller;
use JetBrains\PhpStorm\NoReturn;

class ProductController extends Controller
{
    public function index(): void
    {
        $products = new ProductsModel();


        $data = [
            'title' => 'Products',
            'products' => $products->getProducts()
        ];
        $this->renderView('product', $data);
    }

    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = (float) $_POST['price'];

            $productsModel = new ProductsModel();
            $productsModel->addProduct($name, $description, $price);

            header('Location: /products');
            exit;
        }
    }

    public function delete(int $id): void
    {
        $productsModel = new ProductsModel();
        $productsModel->deleteProduct($id);

        header('Location: /products');
        exit;
    }

    public function edit(int $id): void
    {
        $productsModel = new ProductsModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = (float) $_POST['price'];

            $productsModel->updateProduct($id, $name, $description, $price);

            header('Location: /products');
            exit;
        }

        $product = $productsModel->getProductById($id);
        $data = [
            'title' => 'Edit Product',
            'product' => $product
        ];
        $this->renderView('edit_product', $data);
    }

    #[NoReturn] public function toggleChecked(int $id): void
    {
        $productsModel = new ProductsModel();
        $productsModel->toggleChecked($id);

        header('Location: /products');
        exit;
    }
}