<?php
require_once 'models/Product.php';

class ProductController
{
    public function index()
    {
        require_once 'views/products/best.php';
    }

    public function handle()
    {
        Helpers::isAdmin();

        $products = new Product;
        $result = $products->getAll();

        require_once 'views/products/handle.php';
    }
}
