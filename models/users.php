<?php

require_once("base.php");
require("validators/validators.php");

class Users extends Base
{

  public function getAllUsers() {
    $sql = "
    SELECT 
      user_id, first_name, last_name, city, postal_code, created_at
    FROM 
      users
    ";

    $query = $this->db->prepare($sql);
    $query->execute([]);

    return $query->fetchAll( PDO::FETCH_ASSOC );
  }

  public function getUserById($user) {
    $sql = "
    SELECT 
      user_id, first_name, last_name, phone, city, postal_code, created_at, age, address, email, password
    FROM 
      users
    WHERE 
      user_id = ?
    ";

    $query = $this->db->prepare($sql);
    $query->execute([ 
      isset($user[ "logged" ]["user_id"]) ? $user[ "logged" ]["user_id"] : $user["user_id"]  
    ]);

    return $query->fetch( PDO::FETCH_ASSOC );
  }

  public function getUserByAdId($ad_id) {
    $sql = "
    SELECT 
      u.first_name, u.last_name, u.phone, u.city, u.postal_code, u.created_at
    FROM 
      users as u
    INNER JOIN 
      ads as a USING(user_id)
    WHERE 
      ad_id = ?
    ";

    $query = $this->db->prepare($sql);
    $query->execute([ $ad_id ]);

    return $query->fetch( PDO::FETCH_ASSOC );
  }

  public function createUser( $user ) {
  
    if( validateRegisterUser($user) ) {
      $sql = "
      INSERT INTO 
        users (first_name, last_name, age, email, password, address, city, postal_code, phone, country_id) 
      VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
      ";

      $query= $this->db->prepare($sql);
          
      $result = $query->execute([
        $user["first_name"],
        $user["last_name"],
        $user["age"],
        $user["email"],
        password_hash($user["password"], PASSWORD_DEFAULT),
        $user["address"],
        $user["city"],
        $user["postal_code"],
        $user["phone"],
        $user["country"]
      ]);
          
      return $result ? $this->db->lastInsertId() : 0;

    }

    return 0;

  }
  
  public function loginUser( $user ) {
    
    if( validateLogin($user) ) {

      $sql = "
      SELECT 
        user_id, first_name, password
      FROM 
        users
      WHERE 
        email = ?
      ";

      $query = $this->db->prepare($sql);
      
      $query->execute([ $user["email"] ]);
      
      return $query->fetch( PDO::FETCH_ASSOC );

    }
      
      return 0;
  }

  public function updateUser( $user ) {

    $sql = "
      UPDATE 
        users
      SET
        first_name = ?,
        last_name = ?,
        email = ?,
        password = ?,
        city = ?,
        phone = ?,
        updated_at = now()
      WHERE 
        user_id = ?
      ";

      $query = $this->db->prepare($sql);
      
      $result = $query->execute([ 
        $user["first_name"],
        $user["last_name"],
        $user["email"],
        password_hash($user["new_password"], PASSWORD_DEFAULT),
        $user["city"],
        $user["phone"],
        $user["user_id"]
      ]);
      
      return $result ? 1 : 0;

  }

  public function deleteUser($user) {
    
    $sql = "
    DELETE FROM 
      users 
    WHERE 
      user_id = ?
    ";

    $query = $this->db->prepare($sql);
    
    return $query->execute([ $user["user_id"] ]);
  
  }

}