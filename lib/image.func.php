<?php 
require_once 'string.func.php';
function verifyImage($type=1,$length=4,$pixel=200,$line=4,$sess_name="verify"){
	session_start();
	$width=100;
	$height=30;
	$image=imagecreatetruecolor($width, $height);
	$bgcolor=imagecolorallocate($image, 255, 255, 255);
	imagefill($image,0, 0, $bgcolor);
	$chars=buildRandomString($type,$length);
	$_SESSION[$sess_name] = $chars;
	$fontfiles=array("SIMYOU.TTF");
	for($i=0;$i<$length;$i++){
		$size=mt_rand(14, 18);
		$angle=mt_rand(-15, 15);
		$x =($i*100/4)+rand(5, 10);
        $y = rand(20,26);
        $fontfile="../fonts/".$fontfiles[mt_rand(0,count($fontfiles)-1)];
        $color=imagecolorallocate($image, rand(0,120),  rand(0,120),  rand(0,120));
        $text=substr($chars,$i,1);
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
	}
	if($pixel){
		for($i=0;$i<$pixel;$i++){
			$color=imagecolorallocate($image, rand(50,200),rand(50,200), rand(50,200));
			imagesetpixel($image, rand(1,99),rand(1,29), $color);
		}
	}
	if($line){
		for($i=0;$i<$line;$i++){
		$color=imagecolorallocate($image, rand(80,220), rand(80,220), rand(80,220));
		imageline($image, rand(1,99), rand(1,29), rand(1,99), rand(1,29), $color);
		}
		}
// 		$i=$_SESSION['verify'];
// 		var_dump($i);
// 		exit();
	header("Content-type:image/png");
	imagepng($image);
	imagedestroy($image);
}


/**
 * 添加文字水印
 * @param unknown $filename
 * @param string $fonts
 * @param string $text
 */
function waterText($filename,$fonts="SIMYOU.TTF",$text="dons.com"){
	$fileInfo=getimagesize($filename);
	$mime=$fileInfo['mime'];
	$createFun=str_replace("/", "createfrom",$mime);
	$outfun=str_replace("/", null,$mime);
	$image=$createFun($filename);
	$color=imagecolorallocatealpha($image, 255, 0,0,50);
	$fontfile="../fonts/{$fonts}";
	imagettftext($image, 14, 0, 0, 14, $color, $fontfile, $text);
// 	header("Content-type:".$mime);
	$outfun($image,$filename);
	imagedestroy($image);
}
  
/**
 * 添加图片水印
 * @param string $dstFile 要设置水印的图片
 * @param string $srcFile  水印图片
 * @param number $pct  透明度
 */
function waterPic($dstFile,$srcFile="../images/logo.jpg",$pct=30){
	$srcFileInfo = getimagesize ( $srcFile );
	$src_w = $srcFileInfo [0];
	$src_h = $srcFileInfo [1];
	$dstFileInfo = getimagesize ( $dstFile );
	$srcMime = $srcFileInfo ['mime'];
	$dstMime = $dstFileInfo ['mime'];
	$createSrcFun = str_replace ( "/", "createfrom", $srcMime );
	$createDstFun = str_replace ( "/", "createfrom", $dstMime );
	$outDstFun = str_replace ( "/", null, $dstMime );
	$dst_im = $createDstFun ( $dstFile );
	$src_im = $createSrcFun ( $srcFile );
	imagecopymerge ( $dst_im, $src_im, 0, 0, 0, 0, $src_w, $src_h, $pct );
	//	header ( "content-type:" . $dstMime );
	$outDstFun ( $dst_im, $dstFile );
	imagedestroy ( $src_im );
	imagedestroy ( $dst_im );
}