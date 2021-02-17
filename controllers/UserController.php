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

            // Validate info
            $errors = array();

            if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
                $name_validated = true;
            } else {
                $name_validated = false;
                $errors['name'] = "Nombre inválido";
            }

            // Validar apellidos
            if (!empty($last_name) && !is_numeric($last_name) && !preg_match("/[0-9]/", $last_name)) {
                $last_name_validated = true;
            } else {
                $last_name_validated = false;
                $errors['last_name'] = "Apellido inválido";
            }

            // Validar el email
            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_validated = true;
            } else {
                $email_validated = false;
                $errors['email'] = "Correo inválido";
            }

            // Validar la contraseña
            if (!empty($password)) {
                $password_validated = true;
            } else {
                $password_validated = false;
                $errors['password'] = "Contraseña inválida";
            }

            if ($name && $last_name && $email && $password && count($errors) == 0) {
                $user = new User();
                $user->setName($name);
                $user->setLastName($last_name);
                $user->setEmail($email);
                $user->setPassword($password);

                $save = $user->save();
            }

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

    public function login()
    {
        if (isset($_POST)) {
            // Identify user
            // Send a query to the db
            $user = new User;
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            $identity = $user->login();

            if ($identity && is_object($identity)) {
                // Create a SESSION
                $_SESSION['identity'] = $identity;

                if ($identity->role == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'Identificación Fallida';
            }
        }
        header("Location: " . base_url);
    }
}
