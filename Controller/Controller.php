<?php
session_start();

include_once 'Model/Model.php';

class Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function invoke()
    {
        if (isset($_GET['admin'])) {
            // User wants to access admin screen
            if (isset($_SESSION['adminUser'])) {
                // User is already logged in
                include 'View/admin.php';
            } else if (isset($_POST['username']) && isset($_POST['password'])) {
                // User has just logged in
                $validLogin = $this->model->checkLogin($_POST['username'], $_POST['password']);
                if ($validLogin) {
                    $_SESSION['adminUser'] = $_POST['username'];
                    include 'View/admin.php';
                } else {
                    $loginError = true;
                    include 'View/login.php';
                }
            } else {
                // Show login screen
                include 'View/login.php';
            }
        } else if (isset($_GET['addItem'])) {
            // User wants to add an item
            $this->model->addItem($_POST['name'], $_POST['description'], $_POST['categoryId'], $_POST['statusId'], $_POST['locationId']);
            $items = $this->model->getItemList();
            include 'View/itemList.php';
        } else if (isset($_GET['logout'])) {
            // Log the user out
            session_destroy();
            $items = $this->model->getItemList();
            include 'View/itemList.php';
        } else {
            $items = $this->model->getItemList();
            include 'View/itemList.php';
        }
    }
}
