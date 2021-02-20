<?php

class Helpers
{
    public static function deleteSession($session)
    {
        if (isset($_SESSION[$session])) {
            $_SESSION[$session] = null;
            unset($_SESSION[$session]);
        }

        return $session;
    }

    public static function isAdmin()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function showLastSixCategories()
    {
        require_once 'models/Category.php';
        $category = new Category;
        $categories = $category->getSix();

        return $categories;
    }

    public static function showCategories()
    {
        require_once 'models/Category.php';
        $category = new Category;
        $categories = $category->getAll();

        return $categories;
    }
}
