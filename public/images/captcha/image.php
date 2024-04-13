<?php

// Begin the session
session_start();

// If the session is not present, set the variable to an error message
if(!isset($_SESSION['captcha_id']))
	$str = 'ERROR!';
// Else if it is present, set the variable to the session contents
else
$str = $_SESSION['captcha_id'];

// Set the content type
//header('Content-type: image/png');
header('Cache-control: no-cache');

// Create an image from button.png
$image = imagecreatefrompng('button.png');

// Set the font colour
//$colour = imagecolorallocate($image, 159, 157, 149);
$colour = imagecolorallocate($image, 127, 111, 79);

// Set the font
$font = "Anorexia.ttf";

// Set a random integer for the rotation between -15 and 15 degrees
$rotate = rand(-10, 10);

// Create an image using our original image and adding the detail
imagettftext($image, 15, $rotate, 25, 30, $colour, $font, $str);

// Output the image as a png
imagepng($image);

?>