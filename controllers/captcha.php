<?php

session_start();

header("Content-Type: image/png");

chdir('../');

$image = imagecreate(210, 100);

imagecolorallocate($image, 100, 190, 200);

$font = getcwd() . "\\assets\\fonts\\captcha.ttf";

$color = imagecolorallocate($image, 255, 255, 255);

$text = mb_strtoupper(bin2hex( random_bytes(3) ));

$_SESSION["captcha"] = $text;

imagettftext($image, 30, 0, 35, 60, $color, $font, $text);

imagepng($image);

