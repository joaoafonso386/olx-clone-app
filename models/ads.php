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

}