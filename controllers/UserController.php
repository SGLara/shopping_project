<?php

class UserController
{
    public function index()
    {
        echo "Hola, soy UserController";
    }

    public function register()
    {
        require_once "views/users/register.php";
    }

    public function save()
    {
        if (isset($_POST)) {
            var_dump($_POST);
        }
    }
}
