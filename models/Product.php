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
        $this->name = $name;
    }

    function getDescription()
    {
        return $this->description;
    }

    function setDescription($description)
    {
        $this->description = $description;
    }

    function getPrice()
    {
        return $this->price;
    }

    function setPrice($price)
    {
        $this->price = $price;
    }

    function getStock()
    {
        return $this->stock;
    }

    function setStock($stock)
    {
        $this->stock = $stock;
    }

    function getOffer()
    {
        return $this->offer;
    }

    function setOffer($offer)
    {
        $this->offer = $offer;
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
}
