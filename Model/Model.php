<?php
include_once('DBConnect.php');

class Model
{
    private $conn;

    public function __construct()
    {
        $this->conn = DBConnect::getInstance()->getHandler();
    }

    // Login Queries

    public function checkLogin($username, $password)
    {
        $st = $this->conn->prepare(
            "SELECT * FROM admin WHERE username = :username"
        );
        $st->bindParam(':username', $username);
        $st->execute();
        $result = $st->fetch(PDO::FETCH_OBJ);

        if ($result && password_verify($password, $result->password)) {
            return true;
        }
        return false;
    }

    // Item Queries

    public function getItemList()
    {
        $st = $this->conn->prepare("SELECT Item.id, Item.name, Item.description, Category.category, Status.status, Location.location 
                    FROM Item
                    JOIN Category ON Item.categoryId = Category.id
                    JOIN Status ON Item.statusId = Status.id
                    JOIN Location ON Item.locationId = Location.id");
        $st->execute();
        $itemList = $st->fetchAll(PDO::FETCH_OBJ);

        return $itemList;
    }

    public function getItem(int $id)
    {
        $st = $this->conn->prepare("SELECT Item.id, Item.name, Item.description, Category.category, Status.status, Location.location 
                    FROM Item
                    JOIN Category ON Item.categoryId = Category.id
                    JOIN Status ON Item.statusId = Status.id
                    JOIN Location ON Item.locationId = Location.id
                    WHERE id=:id");
        $st->bindParam(':id', $id);
        $st->execute();
        $item = $st->fetch(PDO::FETCH_OBJ);
        return $item;
    }

    public function addItem($name, $description, $categoryId, $statusId, $locationId)
    {
        $st = $this->conn->prepare("INSERT INTO Item(name, description, categoryId, statusId, locationId)
        VALUES(:name, :description, :categoryId, :statusId, :locationId)");
        $st->bindParam(':name', $name);
        $st->bindParam(':description', $description);
        $st->bindParam(':categoryId', $categoryId);
        $st->bindParam(':statusId', $statusId);
        $st->bindParam(':locationId', $locationId);
        $st->execute();
    }

    public function updateItem($name, $description, $categoryId, $statusId, $locationId)
    {
        $st = $this->conn->prepare("UPDATE Item
        SET name = :name, description = :description, categoryId = :categoryId, statusId = :statusId, locationId = :locationId");
        $st->bindParam(':name', $name);
        $st->bindParam(':description', $description);
        $st->bindParam(':categoryId', $categoryId);
        $st->bindParam(':statusId', $statusId);
        $st->bindParam(':locationId', $locationId);
        $st->execute();
    }

    public function deleteItem(int $id)
    {
        $st = $this->conn->prepare("DELETE FROM Item WHERE id = :id");
        $st->bindParam(':id', $id);
        $st->execute();
    }

    // Category Queries

    public function getCategoryList()
    {
        $st = $this->conn->prepare("SELECT * FROM Category");
        $st->execute();
        $itemList = $st->fetchAll(PDO::FETCH_OBJ);

        return $itemList;
    }

    public function getCategory(int $id)
    {
        $st = $this->conn->prepare("SELECT category from Category
                    WHERE id=:id");
        $st->bindParam(':id', $id);
        $st->execute();
        $item = $st->fetch(PDO::FETCH_OBJ);
        return $item->category;
    }

    public function addCategory($category)
    {
        $st = $this->conn->prepare("INSERT INTO Category(category)
        VALUES(:category)");
        $st->bindParam(':category', $category);
        $st->execute();
        return $this->conn->lastInsertId();
    }

    public function updateCategory($category)
    {
        $st = $this->conn->prepare("UPDATE Category
        SET category = :category");
        $st->bindParam(':category', $category);
        $st->execute();
    }

    public function deleteCategory(int $id)
    {
        $st = $this->conn->prepare("DELETE FROM Category WHERE id = :id");
        $st->bindParam(':id', $id);
        $st->execute();
    }

    // Status Queries

    public function getStatusList()
    {
        $st = $this->conn->prepare("SELECT * FROM Status");
        $st->execute();
        $itemList = $st->fetchAll(PDO::FETCH_OBJ);

        return $itemList;
    }

    public function getStatus(int $id)
    {
        $st = $this->conn->prepare("SELECT status FROM Status
                    WHERE id=:id");
        $st->bindParam(':id', $id);
        $st->execute();
        $item = $st->fetch(PDO::FETCH_OBJ);
        return $item->status;
    }

    public function addStatus($status)
    {
        $st = $this->conn->prepare("INSERT INTO Status(status)
        VALUES(:status)");
        $st->bindParam(':status', $status);
        $st->execute();
        return $this->conn->lastInsertId();
    }

    public function updateStatus($status)
    {
        $st = $this->conn->prepare("UPDATE Status
        SET status = :status");
        $st->bindParam(':status', $status);
        $st->execute();
    }

    public function deleteStatus(int $id)
    {
        $st = $this->conn->prepare("DELETE FROM Status WHERE id = :id");
        $st->bindParam(':id', $id);
        $st->execute();
    }

    // Location Queries

    public function getLocationList()
    {
        $st = $this->conn->prepare("SELECT * FROM Location");
        $st->execute();
        $itemList = $st->fetchAll(PDO::FETCH_OBJ);

        return $itemList;
    }

    public function getLocation(int $id)
    {
        $st = $this->conn->prepare("SELECT location from Location
                    WHERE id=:id");
        $st->bindParam(':id', $id);
        $st->execute();
        $item = $st->fetch(PDO::FETCH_OBJ);
        return $item->location;
    }

    public function addLocation($location)
    {
        $st = $this->conn->prepare("INSERT INTO Location(location)
        VALUES(:location)");
        $st->bindParam(':location', $location);
        $st->execute();
        return $this->conn->lastInsertId();
    }

    public function updateLocation($location)
    {
        $st = $this->conn->prepare("UPDATE Location
        SET location = :location");
        $st->bindParam(':location', $location);
        $st->execute();
    }

    public function deleteLocation(int $id)
    {
        $st = $this->conn->prepare("DELETE FROM Location WHERE id = :id");
        $st->bindParam(':id', $id);
        $st->execute();
    }
}
