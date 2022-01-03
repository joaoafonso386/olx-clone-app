<?php

require_once("base.php");

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
    
}