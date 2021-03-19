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
        $this->id = $this->db->real_escape_string($id);
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

    public function getAll()
    {
        return $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
    }

    public function getOne()
    {
        $category = $this->db->query("SELECT * FROM categorias WHERE id = {$this->getId()};");
        return $category->fetch_object();
    }

    public function getSix()
    {
        return $this->db->query("SELECT * FROM categorias ORDER BY id DESC LIMIT 6;");
    }

    public function save()
    {
        $sql = "INSERT INTO categorias VALUES(NULL,'{$this->getName()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = false;
        }
        return $result;
    }
}
