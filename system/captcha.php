<?php
session_start();
// generates an 8 digit alphanumerical code
function random_code(){
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
}
// assigns a variable to the value generated
$generated_code = random_code();
// makes that code valid for that session only
$_SESSION["generated_code"]=$generated_code;
// placeholder size for the captcha
$image_place_holder = imagecreatetruecolor(85, 20);
$image_place_holder_background = imagecolorallocate($image_place_holder, 220, 230, 240);
$image_place_holder_foreground = imagecolorallocate($image_place_holder, rand(180,200), rand(190,210), rand(200,220));
// imagefill ( resource image , int x-coordinate of start point, int y-coordinate of start point, int color )
imagefill($image_place_holder, 1, 0, $image_place_holder_background);
// imagestring ( resource image , int font size , int x-coordinate of the upper left corner, int y-coordinate of the upper left corner , string The string to be written, int A color identifier created with imagecolorallocate())
imagestring($image_place_holder, 5, 5, 3,  $generated_code, $image_place_holder_foreground);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($image_place_holder);
imagedestroy($image_place_holder);