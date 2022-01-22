<?php

class Analytics extends Base
{

  public function numberOfAds() {
    $sql = "
    SELECT 
      COUNT(ad_id) as ads_number
    FROM 
      ads
    ";

    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetch( PDO::FETCH_ASSOC );
  }

  public function numberOfUsers() {
    $sql = "
    SELECT 
      COUNT(user_id) as users_number
    FROM 
      ads
    ";

    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetch( PDO::FETCH_ASSOC );
  }

  public function mostCommentedAd() {
    $sql="
    SELECT 
      ad_id, COUNT(ad_id) as comments, a.title, a.description, a.permalink
    FROM 
      ad_comments
    INNER JOIN 
      ads as a USING(ad_id)
    GROUP BY 
      ad_id
    LIMIT
      1
    ";

    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetch( PDO::FETCH_ASSOC );

  }
  
  public function lastCreatedAd() {
    $sql="
    SELECT 
      title, description, created_at, permalink
    FROM 
      ads
    ORDER BY 
      created_at DESC
    LIMIT 
      1
    ";

    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetch( PDO::FETCH_ASSOC );
  }

  public function lastCreatedUser() {
    $sql="
    SELECT 
      first_name, last_name, created_at
    FROM 
      users
    ORDER BY 
      created_at DESC
    LIMIT 
      1
    ";

    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetch( PDO::FETCH_ASSOC );
  }


}