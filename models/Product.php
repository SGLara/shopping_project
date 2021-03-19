<?php

class Product
{
    private $id;
    private $category_id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $offer;
    private $date;
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

    function getCategoryId()
    {
        return $this->category_id;
    }

    function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);
    }

    function getDescription()
    {
        return $this->description;
    }

    function setDescription($description)
    {
        $this->description = $this->db->real_escape_string($description);
    }

    function getPrice()
    {
        return $this->price;
    }

    function setPrice($price)
    {
        $this->price = $this->db->real_escape_string($price);
    }

    function getStock()
    {
        return $this->stock;
    }

    function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function getOffer()
    {
        return $this->offer;
    }

    function setOffer($offer)
    {
        $this->offer = $this->db->real_escape_string($offer);
    }

    function getDate()
    {
        return $this->date;
    }

    function setDate($date)
    {
        $this->date = $date;
    }

    function getImage()
    {
        return $this->image;
    }

    function setImage($image)
    {
        $this->image = $image;
    }

    public function getAll()
    {
        return $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
    }

    public function getAllCategory()
    {
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p 
                INNER JOIN categorias c ON c.id = p.categoria_id 
                WHERE p.categoria_id = {$this->getCategoryId()}
                ORDER BY id DESC;";
        return $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
    }

    public function getRandom(int $limit)
    {
        return $products = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
    }

    public function getOne()
    {
        $product = $this->db->query(
            "SELECT * FROM productos WHERE id = {$this->getId()};"
        );
        return $product->fetch_object();
    }

    public function save()
    {
        $sql = "INSERT INTO productos VALUES(null, {$this->getCategoryId()}, 
        '{$this->getName()}', '{$this->getDescription()}', {$this->getPrice()},
        {$this->getStock()}, null, CURDATE(), '{$this->getImage()}');";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE productos 
        SET categoria_id= {$this->getCategoryId()},
            nombre = '{$this->getName()}',
            descripcion = '{$this->getDescription()}',
            precio = {$this->getPrice()},
            stock = {$this->getStock()}";

        if ($this->getImage() != null) {
            $sql .= ", imagen = '{$this->getImage()}'";
        }

        $sql .= "WHERE id = {$this->getId()};";

        $edit = $this->db->query($sql);

        $result = false;
        if ($edit) {
            $result = true;
        }

        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM productos WHERE id = {$this->id};";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }

        return $result;
    }
}
