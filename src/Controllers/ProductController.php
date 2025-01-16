<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use Core\Controller;

class ProductController extends Controller
{
    public function index(): void
    {
        $products = new ProductsModel();


        $data = [
            'title' => 'Products',
            'products' => $products->getExampleData()
        ];
        $this->renderView('product', $data);
    }
}