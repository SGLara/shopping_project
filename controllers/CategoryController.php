<?php
require_once 'models/Category.php';
require_once 'models/Product.php';

class CategoryController
{
    public function index()
    {
        Helpers::isAdmin();
        $categories = new Category;
        $result = $categories->getAll();

        require_once 'views/categories/index.php';
    }

    public function show()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            //Get category
            $category = new Category();
            $category->setId($id);
            $category = $category->getOne();

            //Get products
            $product = new Product();
            $product->setCategoryId($id);
            $products = $product->getAllCategory();
        }

        require_once 'views/categories/show.php';
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
