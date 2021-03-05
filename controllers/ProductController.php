<?php
require_once 'models/Product.php';

class ProductController
{
    public function index()
    {
        $product = new Product();
        $products = $product->getRandom(6);
        
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

            if ($name && $description && $price && $stock && $categoryId) {
                $newProduct = new Product;
                $newProduct->setName($name);
                $newProduct->setDescription($description);
                $newProduct->setPrice($price);
                $newProduct->setStock($stock);
                $newProduct->setCategoryId($categoryId);

                //SAVE IMAGE
                if (isset($_FILES['image'])) {
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
                }

                if (isset($_GET['id'])) {
                    $newProduct->setId($_GET['id']);
                    $save = $newProduct->edit();
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

    public function edit()
    {
        Helpers::isAdmin();
        if (isset($_GET['id'])) {
            $edit = true;
            $product = new Product;
            $product->setId($_GET['id']);
            $pro = $product->getOne();

            require_once 'views/products/create.php';
        } else {
            header("Location:" . base_url . "product/handle");
        }
    }

    public function delete()
    {
        Helpers::isAdmin();

        if (isset($_GET['id'])) {
            $product = new Product;
            $product->setId($_GET['id']);
            $deleted = $product->delete();

            if ($deleted) {
                $_SESSION['deleted'] = 'success';
            } else {
                $_SESSION['deleted'] = 'failed';
            }
        } else {
            $_SESSION['deleted'] = 'failed';
        }

        header("Location:" . base_url . "product/handle");
    }
}
