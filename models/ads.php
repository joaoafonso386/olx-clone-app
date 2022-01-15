<?php

require_once("base.php");

class Ads extends Base
{

  public function getAllAds() {

    $sql = "
    SELECT 
      ad_id, image, title, price, created_at, permalink
    FROM 
      ads
    ";

    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll( PDO::FETCH_ASSOC );

  }

  public function getAdsByCategory($category_name) {

    $sql = "
    SELECT 
      a.title, a.image, a.price, a.created_at, a.permalink
    FROM 
      ads as a
    INNER JOIN 
      categories as c USING(category_id)
    WHERE 
      MATCH(c.permalink) AGAINST (?) OR
      c.permalink LIKE ?
    ";

    $query = $this->db->prepare($sql);
    $query->execute([ $category_name, "%".$category_name."%"]);

    return $query->fetchAll( PDO::FETCH_ASSOC );

  }

  public function getAdsBySearchTerm($search_term) {

    $sql = "
    SELECT 
      title, image, price, created_at, permalink
    FROM 
      ads
    WHERE 
      MATCH(title) AGAINST(?) OR 
      MATCH(description) AGAINST(?) OR 
      title LIKE ? OR
      description LIKE ?
    ORDER BY created_at
    ";

    $query = $this->db->prepare($sql);
    $query->execute([ $search_term, $search_term, "%".$search_term."%", "%".$search_term."%" ]);

    return $query->fetchAll( PDO::FETCH_ASSOC );
  }

  public function getAdByPermalink($ad_permalink) {
    $sql = "
    SELECT 
      ad_id, title, image, price, created_at, description, permalink
    FROM 
      ads
    WHERE 
      permalink = ?
    ";

    $query = $this->db->prepare($sql);
    $query->execute([ $ad_permalink ]);

    return $query->fetch( PDO::FETCH_ASSOC );
  }

  public function createAd($ad, $user, $permalink, $image) {
    $sql = "
    INSERT INTO
      ads (image, title, description, price, post_views, user_id, category_id, permalink)
    VALUES 
      (?, ?, ?, ?, 0, ?, ?, ?)
    ";

    $query = $this->db->prepare($sql);
    $result = $query->execute([ 
        $image, 
        $ad["title"], 
        $ad["description"], 
        $ad["price"], 
        $user[ "logged" ]["user_id"], 
        $ad["category"], 
        $permalink 
      ]);

    return $result ? 1 : 0;
  }

 
}