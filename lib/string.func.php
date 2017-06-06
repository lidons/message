<?php 
	function buildRandomString($type=1,$length=4){
	if($type==1){
		$chars=join("",range(0, 9));
	}elseif ($type==2){
		$chars = join("",array_merge(range("a", "z"),range("A", "Z"),range(0, 9)));
	}elseif ($type==3){
		$chars=join("", array_merge(range("a", "z"),range("A", "Z")));
	}
	
	if($length>strlen($chars)){
		exit("字符串长度不够");
	}
	$chars=str_shuffle($chars);
	return substr($chars, 0,$length);
	}
	
	/**
	 * 生成唯一的字符串
	 * @return string
	 */
	function getUniName(){
		return md5(uniqid(microtime(true),true));
	}
	
	/**
	 * 得到扩展名
	 * @param unknown $filename
	 * @return string
	 */
	function getExt($filename){
		@($res=strtolower(end(explode(".",$filename))));
		return $res;
	}
	
	/**
	 * 生成缩略图
	 * @param string $filename
	 * @param string $destination
	 * @param int $dst_w
	 * @param int $dst_h
	 * @param string $isReservedSource 是否删除源图片 falst为删除 
	 * 
	 * @param real $scale
	 * @return string
	 */
	function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=true,$scale=0.5){
		list($src_w,$src_h,$imagetype)=getimagesize($filename);
		if(is_null($dst_w)||is_null($dst_h)){
			$dst_w=ceil($src_w*$scale);
			$dst_h=ceil($src_h*$scale);
		}
		$mime=image_type_to_mime_type($imagetype);
		$createFun=str_replace("/", "createfrom", $mime);
		$outFun=str_replace("/", null, $mime);
		$src_image=$createFun($filename);
		$dst_image=imagecreatetruecolor($dst_w, $dst_h);
		imagecopyresampled($dst_image, $src_image, 0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
		//image_50/sdfsdkfjkelwkerjle.jpg
		if($destination&&!file_exists(dirname($destination))){
			mkdir(dirname($destination),0777,true);
		}
		$dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;
		$outFun($dst_image,$dstFilename);
		imagedestroy($src_image);
		imagedestroy($dst_image);
		if(!$isReservedSource){
			unlink($filename);
		}
		return $dstFilename;
	}
	
	
	