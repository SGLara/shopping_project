<?php

class Category
{
    private $id;
    private $name;
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
        $this->name = $name;
    }

    public function getAll()
    {
        return $this->db->query("SELECT * FROM categorias;");
    }
}
