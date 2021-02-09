<?php
require_once 'models/User.php';

class UserController
{
    public function register()
    {
        require_once "views/users/register.php";
    }

    public function save()
    {
        if (isset($_POST)) {
            $user = new User();
            $user->setName($_POST['name']);
            $user->setLastName($_POST['last_name']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            $save = $user->save();

            // var_dump($user);

            if ($save) {
                $_SESSION['register'] = 'Registrado';
            } else {
                $_SESSION['register'] = 'Registro fallido';
            }
        } else {
            $_SESSION['register'] = 'Registro fallido';
        }
        header("Location:" . base_url . "user/register");
    }
}
