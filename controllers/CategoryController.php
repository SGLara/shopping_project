<?php
require_once 'models/Category.php';

class CategoryController
{
    public function index()
    {
        $categories = new Category;
        $result = $categories->getAll();

        require_once 'views/categories/index.php';
    }
}
