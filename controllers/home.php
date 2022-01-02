<?php

require("models/categories.php");
require("models/ads.php");

$modelCategories = new Categories();
$modelAds = new Ads();

$categories = $modelCategories->getAllCategories();
$ads = $modelAds->getAllAds();

require("views/home.php");