<?php
//���ļ��ϴ�
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
//ֻ�ô�ͼƬ�ļ�
$imgFlag=true;

//�ж��´�����Ϣ
if($error==UPLOAD_ERR_OK){
// 	�ļ��Ƿ���ͬ��http post�ϴ�������
	$ext=getExt($filename);
	//�����ϴ��ļ�����
	if(!in_array($ext,$allowExt)){
		exit ("�Ƿ��ļ�����");
	}
	if($size>$maxSize){
		exit ("�ļ�����");
	}
	if($imgFlag){
		//�����֤�ļ��Ƿ�ΪͼƬ����
		//getimagesize($filename)
		$info=getimagesize($tmp_name);
			if(!$info){
				exit("����������ͼƬ����");
			}
		}
// 	var_dump($ext);exit();
	$ext=getExt($filename);
	$filename=getUniName().".".$ext;
	$path="uploads";
	//���uploads�����ڵĻ�������
	if(!file_exists($path)){
		mkdir($path,0777,true);
	}
	
	$destination= $path."/".$filename;
	if(is_uploaded_file($tmp_name)){
// 		���ϴ��������ļ��ƶ���ָ����Ŀ¼��
		if(move_uploaded_file($tmp_name, $destination)){
			$mes="�ļ��ϴ��ɹ�";
		}else{
			$mes="�ļ��ƶ�ʧ��";
		}
	}else{
		$mes ="�ļ�����ͨ��HTTP POST��ʽ�ϴ�������";
	}
}else{
	switch($error){
		case 1:
			$mes="�����������ļ��ϴ��Ĵ�С";
			break;
		case 2:
			$mes="�����˱������ϴ��ļ���С";//UPLOAD_ERR_FORM_SIZE
			break;
		case 3:                   
			$mes="�ļ����ֱ��ϴ�";//UPLOAD_ERR_PARTIAL
			break;
		case 4:
			$mes="û��Ŀ¼���ϴ�";//UPLOAD_ERR_NO_FILE
			break;
		case 6:
			$mes="û���ҵ���ʱĿ¼";//UPLOAD_ERR_NO_TMP_DIR
		    break;
		case 7:
			$mes="�ļ�����д";//UPLOAD_ERR_CANT_WRITE
			break;
		case 8:
			$mes="������չ�жϵ��ļ��ϴ�";//UPLOAD_ERR_EXTENSION	
		    break;
	}
}
echo $mes;


/*
 * ��������
*file_uploads = On ֧��ͨ��HTTP�ϴ��ļ�
*upload_tmp_dir =G:\php.dev\tese ��ʱ�ļ�����Ŀ¼
*upload_max_filesize = 2M �ļ�����ϴ��Ĵ�С��
*post_max_size = 8M ����post��ʽ�ϴ������Ϊ8M
*/

/*
 * �ͻ���
 * <input type="hidden" name="MAX_FILE_SIZE" value="1024" />
 * <input type="file" name="myFile" accept="�ļ���MIME����,..."/>
*/













