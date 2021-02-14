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
        $this->name= $this->db->real_escape_string($name);
    }

    function getLastName()
    {
        return $this->last_name;
    }

    function setLastName($last_name)
    {
        $this->last_name =$this->db->real_escape_string($last_name);
    }

    function getEmail()
    {
        return $this->email;
    }

    function setEmail($email)
    {
        $this->email =$this->db->real_escape_string($email);
    }

    function getPassword()
    {
        return $this->password;
    }

    function setPassword($password)
    {
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
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
}