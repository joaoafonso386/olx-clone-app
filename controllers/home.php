<?php

require("models/categories.php");
require("models/ads.php");
require("utils/utils.php");

$modelCategories = new Categories();
$modelAds = new Ads();

$categories = $modelCategories->getAllCategories();
$ads = $modelAds->getAllAds();

require("views/home.php");