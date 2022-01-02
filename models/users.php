<?php
require_once("base.php");

class Users extends Base
{

  public function getUserByAdId($ad_id) {
    $sql = "
    SELECT first_name, last_name
    FROM users
    INNER JOIN ads USING(user_id)
    WHERE ad_id = ?
    ";

    $query = $this->db->prepare($sql);
    $query->execute([ $ad_id ]);

    return $query->fetch( PDO::FETCH_ASSOC );
    }
    
}