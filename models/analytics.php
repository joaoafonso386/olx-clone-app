<?php

class Analytics extends Base
{

  //numero de anúncios
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
  //numero de utilizadores
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
  //anuncio com mais comentarios
  //ultimo anúncio criado
  //ultimo anuncio updatado


}