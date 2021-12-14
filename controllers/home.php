<?php

require("models/categories.php");
require("models/ads.php");

$modelCategories = new Categories();
$modelAds = new Ads();
$categories = $modelCategories->getAll();
$ads = $modelAds->getAll();

require("views/home.php");