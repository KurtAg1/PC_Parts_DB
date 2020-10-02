<?php
class DBConnect
{
  private static $_singleton;
  private $_connection;

  private $DB_USERNAME = 'root';
  private $DB_PASSWORD = '';
  private $DB_HOST = 'localhost';

  private function __construct()
  {
    $this->_connection = new PDO(
      "mysql:host=$this->DB_HOST;dbname=PartsDB",
      $this->DB_USERNAME,
      $this->DB_PASSWORD
    );
    $this->_connection->exec('SET CHARACTER SET utf8');
  }

  public static function getInstance()
  {
    if (is_null(self::$_singleton)) {
      self::$_singleton = new DBConnect();
    }
    return self::$_singleton;
  }

  public function getHandler()
  {
    return $this->_connection;
  }
}
