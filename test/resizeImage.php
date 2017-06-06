<?php
/**
 *$src_w ��ʼ�Ŀ�� 
 *$src_h ��ʼ�ĸ߶�
 *$scale Ϊ���ŵı���
 *$dst_w ��Ҫ�ĵ�ͼƬ�Ŀ��
 *$dst_h ���õ�ͼƬ�ĸ߶�
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