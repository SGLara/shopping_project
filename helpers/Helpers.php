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

    public static function showCategory()
    {
        require_once 'models/Category.php';
        $category = new Category;
        $categories = $category->getSix();

        return $categories;
    }
}
