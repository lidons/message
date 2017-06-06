<?php
//单文件上传
require_once '../lib/string.func.php';
// header("Content-type:text/hmtl;charset=utf8");
// header('Content-type:text-type;charset=utf8');
$filename=$_FILES['myFile']['name'];
$type=$_FILES['myFile']['type'];
$tmp_name=$_FILES['myFile']['tmp_name'];
$error=$_FILES['myFile']['error'];
$size=$_FILES['myFile']['size'];
$allowExt=array("gif","jpeg","jpg","png","webmp");
$maxSize=1048576;
//只让传图片文件
$imgFlag=true;

//判断下错误信息
if($error==UPLOAD_ERR_OK){
// 	文件是否是同过http post上传上来的
	$ext=getExt($filename);
	//限制上传文件类型
	if(!in_array($ext,$allowExt)){
		exit ("非法文件类型");
	}
	if($size>$maxSize){
		exit ("文件过大");
	}
	if($imgFlag){
		//如何验证文件是否为图片类型
		//getimagesize($filename)
		$info=getimagesize($tmp_name);
			if(!$info){
				exit("不是真正的图片类型");
			}
		}
// 	var_dump($ext);exit();
	$ext=getExt($filename);
	$filename=getUniName().".".$ext;
	$path="uploads";
	//如果uploads不存在的话，创建
	if(!file_exists($path)){
		mkdir($path,0777,true);
	}
	
	$destination= $path."/".$filename;
	if(is_uploaded_file($tmp_name)){
// 		将上传上来的文件移动到指定的目录下
		if(move_uploaded_file($tmp_name, $destination)){
			$mes="文件上传成功";
		}else{
			$mes="文件移动失败";
		}
	}else{
		$mes ="文件不是通过HTTP POST方式上传上来的";
	}
}else{
	switch($error){
		case 1:
			$mes="超过了配置文件上传的大小";
			break;
		case 2:
			$mes="超过了表单设置上传文件大小";//UPLOAD_ERR_FORM_SIZE
			break;
		case 3:                   
			$mes="文件部分被上传";//UPLOAD_ERR_PARTIAL
			break;
		case 4:
			$mes="没有目录被上传";//UPLOAD_ERR_NO_FILE
			break;
		case 6:
			$mes="没有找到临时目录";//UPLOAD_ERR_NO_TMP_DIR
		    break;
		case 7:
			$mes="文件不可写";//UPLOAD_ERR_CANT_WRITE
			break;
		case 8:
			$mes="由于扩展中断的文件上传";//UPLOAD_ERR_EXTENSION	
		    break;
	}
}
echo $mes;


/*
 * 服务器端
*file_uploads = On 支持通过HTTP上传文件
*upload_tmp_dir =G:\php.dev\tese 临时文件保持目录
*upload_max_filesize = 2M 文件最大上传的大小；
*post_max_size = 8M 表单以post方式上传的最大为8M
*/

/*
 * 客户端
 * <input type="hidden" name="MAX_FILE_SIZE" value="1024" />
 * <input type="file" name="myFile" accept="文件的MIME类型,..."/>
*/













