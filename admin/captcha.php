<?php
session_start();

$txt=rand(10000,99999);

$_SESSION["vercode"]=$txt;
$height=25;
$width=65;

$image=imagecreate($width,$height);
$black=imagecolorallocate($image,233, 224, 213);
$white=imagecolorallocate($image,0,0,0);

$font=14;

imagestring($image,$font,5,5,$txt,$white);
imagejpeg($image);
?>