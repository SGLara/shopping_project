<?php
require_once 'models/Category.php';

class CategoryController
{
    public function index()
    {
        Helpers::isAdmin();
        $categories = new Category;
        $result = $categories->getAll();

        require_once 'views/categories/index.php';
    }

    public function create()
    {
        Helpers::isAdmin();
        require_once 'views/categories/create.php';
    }

    public function save()
    {
        Helpers::isAdmin();

        // Save Category
        if (isset($_POST)) {
            $newCategory = new Category;
            $newCategory->setName($_POST['name']);
            $newCategory->save();
        }

        header("Location:" . base_url . "category/index");
    }
}
