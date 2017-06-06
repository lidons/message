<?php

$filename="des_big.jpg";
function waterText($filename,$fonts="SIMYOU.TTF",$text="dons.com"){
$fileInfo=getimagesize($filename);
$mime=$fileInfo['mime'];
$createFun=str_replace("/", "createfrom",$mime);
$outfun=str_replace("/", null,$mime);
$image=$createFun($filename);
$color=imagecolorallocatealpha($image, 255, 0,0,50);
$fontfile="../fonts/{$fonts}";
imagettftext($image, 14, 0, 0, 14, $color, $fontfile, $text);
header("Content-type:".$mime);
$outfun($image,$filename);
imagedestroy($image);
}