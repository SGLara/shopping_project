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

    public function create()
    {
        Helpers::isAdmin();
        require_once 'views/products/create.php';
    }

    public function save()
    {
        Helpers::isAdmin();

        // Save Product
        if (isset($_POST)) {
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoryId = isset($_POST['category']) ? $_POST['category'] : false;
            // $image = isset($_POST['image']) ? $_POST['image'] : false;

            if ($name && $description && $price && $stock && $categoryId) {
                $newProduct = new Product;
                $newProduct->setName($name);
                $newProduct->setDescription($description);
                $newProduct->setPrice($price);
                $newProduct->setStock($stock);
                $newProduct->setCategoryId($categoryId);
                // $newProduct->setImage($image);

                $save = $newProduct->save();

                if ($save) {
                    $_SESSION['product'] = "completed";
                } else {
                    $_SESSION['product'] = "failed";
                }
            } else {
                $_SESSION['product'] = "failed";
            }
        } else {
            $_SESSION['product'] = "failed";
        }

        header("Location:" . base_url . "product/handle");
    }
}
