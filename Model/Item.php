<?php
require_once 'DBConnect.php';

class Item
{
  private $id;
  private $name;
  private $description;
  private $category;
  private $status;
  private $location;

  public function __construct($name, $description, $category, $status, $location, $id = null)
  {
    $this->name = $name;
    $this->description = $description;
    $this->category = $category;
    $this->status = $status;
    $this->location = $location;

    $this->id = $id;
  }

  // Getters & Setters
  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function getCategory()
  {
    return $this->category;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function getLocation()
  {
    return $this->location;
  }

  public function setName($name): void
  {
    $this->name = $name;
  }

  public function setDescription($description): void
  {
    $this->description = $description;
  }

  public function setCategory($category): void
  {
    $this->category = $category;
  }

  public function setStatus($status): void
  {
    $this->status = $status;
  }

  public function setLocation($location): void
  {
    $this->location = $location;
  }
}
