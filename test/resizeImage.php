<?php
/**
 *$src_w 初始的宽度 
 *$src_h 初始的高度
 *$scale 为缩放的比例
 *$dst_w 所要的到图片的宽度
 *$dst_h 所得到图片的高度
 */
$filename="des_big.jpg";
$src_image=imagecreatefromjpeg($filename);
list($src_w,$src_h)=getimagesize($filename);
$scale=0.5;
$dst_w=ceil($src_w*$scale);
$dst_h=ceil($src_h*$scale);
$dst_image=imagecreatetruecolor($dst_w, $dst_h);
imagecopyresampled($dst_image, $src_image, 0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
header('Content-type:image/jpeg');
imagejpeg($dst_image);
imagedestroy($src_image);
imagedestroy($dst_image);