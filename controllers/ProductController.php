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
            /**
             * I am using the NULL COALESCING OPERATOR
             * 
             * I can also do
             * $name = isset($_POST['name']) ? $_POST['name'] : false;
             */
            $name = $_POST['name'] ?? false;
            $description = $_POST['description'] ?? false;
            $price = $_POST['price'] ?? false;
            $stock = $_POST['stock'] ?? false;
            $categoryId = $_POST['category'] ?? false;
            // $image = $_POST['image']) ? $_POST['image'] : false;

            if ($name && $description && $price && $stock && $categoryId) {
                $newProduct = new Product;
                $newProduct->setName($name);
                $newProduct->setDescription($description);
                $newProduct->setPrice($price);
                $newProduct->setStock($stock);
                $newProduct->setCategoryId($categoryId);

                //SAVE IMAGE
                $file = $_FILES['image'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if (
                    $mimetype == 'image/jpg' || $mimetype == 'image/jpeg' ||
                    $mimetype == 'image/png' || $mimetype == 'image/gif'
                ) {
                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true);
                    }

                    $newProduct->setImage($filename);
                    move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                }

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
