<?php

require_once("base.php");

class Admin extends Base
{
  public function getAdminById($id) {

      $sql = "
      SELECT 
        full_name, email, position, created_at
      FROM 
        admin
      WHERE 
        admin_id = ?
      ";

      $query = $this->db->prepare($sql);
    
      $query->execute([ $id ]);
      
      return $query->fetch( PDO::FETCH_ASSOC );
  }

  public function loginAdmin( $admin ) {

    if( validateLogin($admin) ) {

      $sql = "
      SELECT 
        admin_id, full_name, password
      FROM 
        admin
      WHERE 
        email = ?
      ";

      $query = $this->db->prepare($sql);
    
      $query->execute([ $admin["email"] ]);
      
      return $query->fetch( PDO::FETCH_ASSOC );

    }
    
    return 0;
    
  }

}