<?php
class Base 
{

  protected $db;

  public function __construct()
  {
    $this->db = new PDO("mysql:host=localhost;dbname=" . CONFIG["DB_NAME"] .";charset=utf8mb4", CONFIG["DB_USERNAME"], CONFIG["DB_PASSWORD"]);  
  }

}