<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $data = ['title' => 'Welcome to My MVC Framework'];
        $this->renderView('home', $data);
    }
}