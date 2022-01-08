<?php header("Content-Type: image/png");

$image = imagecreate(210, 100);

imagecolorallocate($image, 190, 190, 190);

$font ="assets/fonts/DailyChallenge.otf";

$color = imagecolorallocate($image, 0, 0, 0);

$text = bin2hex( random_bytes(4) );

$_SESSION["captcha"] = $text;

imagettftext($image, 30, 0, 35, 60, $color, $font, $text);

imagepng($image);
?>