<?php
require_once 'IOffer.php';

class OfferAllegro implements IOffer
{
    private $id;
    private $link;
    private $name;
    private $price;

    public function __construct($id, $link, $name, $price)
    {
        $this->id = $id;
        $this->link = $link;
        $this->name = $name;
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }
}