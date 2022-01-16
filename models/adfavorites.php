<?php

require_once("base.php");

class AdFavorites extends Base
{

  public function getAllAdsFavorited($user_id) {
    $sql = "
    SELECT 
      ads.ad_id, ads.title, ads.created_at, ads.price, ads.permalink, ads.image, cat.name as category_name, u.city as user_city
    FROM 
      ad_favorites as adf
    INNER JOIN
      ads as ads USING (ad_id)
    INNER JOIN
      categories as cat USING (category_id)
    INNER JOIN
      users as u ON ads.user_id = u.user_id
    WHERE 
      adf.user_id = ?
    ";

    $query = $this->db->prepare($sql);
    $query->execute([ $user_id[ "logged" ]["user_id"] ]);

    return $query->fetchAll( PDO::FETCH_ASSOC );
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

  public function deleteAdFavorite($body) {
    $sql = "
    DELETE FROM 
      ad_favorites
    WHERE 
      user_id = ? AND ad_id = ?
    ";

    $query = $this->db->prepare($sql);

    return $query->execute([ $body["user_id"], $body["ad_id"] ]);
  }

}
