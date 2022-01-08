<?php

require_once("base.php");
require("validators/validators.php");

class Users extends Base
{

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
        users (first_name, last_name, age, email, password, address, city, postal_code, phone, country) 
      VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
      ";

      return 1;
      // $query= $this->db->prepare($sql);
          
      // $result = $query->execute([
      //   $user["first_name"],
      //   $user["last_name"],
      //   $user["age"],
      //   $user["email"],
      //   password_hash($user["password"], PASSWORD_DEFAULT),
      //   $user["address"],
      //   $user["city"],
      //   $user["postal_code"],
      //   $user["phone"],
      //   $user["country"]
      // ]);
          
      // return $result ? $this->db->lastInsertId() : 0;

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

}