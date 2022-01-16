<?php

require_once("base.php");

class AdFavorites extends Base
{

  public function getAllAdsFavorited()
  {
    # code...
  }

  public function addToFavorites($body) {
    $sql = "
    INSERT INTO 
      ad_favorites (ad_id, user_id) 
    VALUES 
      (?, ?)
    ";

    $query = $this->db->prepare($sql);
    $result = $query->execute([ $body["ad_id"], $body["user_id"] ]);

    return $result ? 1 : 0;
  }

  public function getAdFavorited($body) {
    $sql = "
    SELECT 
      ad_id, user_id
    FROM 
      ad_favorites
    WHERE 
      ad_id = ? AND user_id = ?
    ";

    $query = $this->db->prepare($sql);
    $query->execute([ $body["ad_id"], $body["user_id"] ]);

    return $query->fetch( PDO::FETCH_ASSOC );
  }

}
