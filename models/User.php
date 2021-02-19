<?php

class User
{
    private $id;
    private $name;
    private $last_name;
    private $email;
    private $password;
    private $role;
    private $image;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $newName = $this->db->real_escape_string($name);
        $this->name = trim(ucwords($newName));
    }

    function getLastName()
    {
        return $this->last_name;
    }

    function setLastName($last_name)
    {
        $lastName = $this->db->real_escape_string($last_name);
        $this->last_name = trim(ucwords($lastName));
    }

    function getEmail()
    {
        return $this->email;
    }

    function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }
    
    function setPassword($password)
    {
        $this->password = $password; 
    }

    function getRole()
    {
        return $this->role;
    }

    function setRole($role)
    {
        $this->role = $this->db->real_escape_string($role);
    }

    function getImage()
    {
        return $this->image;
    }

    function setImage($image)
    {
        $this->image = $image;
    }


    public function save()
    {
        $sql = "INSERT INTO usuarios VALUES(null, '{$this->getName()}', '{$this->getLastName()}','{$this->getEmail()}','{$this->getPassword()}','user', null);";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;

        // Check if the user exists
        $sql = "SELECT * FROM usuarios WHERE email = '$email';";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $user = $login->fetch_object();

            // Verify password
            $verify = password_verify($password, $user->password);

            if ($verify) {
                $result = $user;
            }
        }
        return $result;
    }
}
