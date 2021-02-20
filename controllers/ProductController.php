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

        $product = new Product;
        $product->getAll();
        
        require_once 'views/products/handle.php';
    }
}
