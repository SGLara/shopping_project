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
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($name && $last_name && $email && $password) {
                $user = new User();
                $user->setName($name);
                $user->setLastName($last_name);
                $user->setEmail($email);
                $user->setPassword($password);

                $save = $user->save();
            }


            // var_dump($user);

            if ($save) {
                $_SESSION['register'] = 'completed';
            } else {
                $_SESSION['register'] = 'failed';
            }
        } else {
            $_SESSION['register'] = 'failed';
        }
        header("Location:" . base_url . "user/register");
    }
}
