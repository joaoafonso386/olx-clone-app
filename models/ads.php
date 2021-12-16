<?php

require_once("base.php");

class Ads extends Base
{

  public function getAll() {

    $sql = "
    SELECT ad_id, image, title, price, created_at
    FROM ads
    ";

    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll( PDO::FETCH_ASSOC );

  }

  public function getByCategory($category_name) {
    $sql = "
    SELECT a.title, a.image, a.price, a.created_at
    FROM ads as a
    INNER JOIN categories as c USING(category_id)
    WHERE c.permalink = ?
    ";

    $query = $this->db->prepare($sql);
    $query->execute([ $category_name ]);

    return $query->fetchAll( PDO::FETCH_ASSOC );

  }

}