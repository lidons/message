<?php
// 多个单文件上传
	require_once '../lib/string.func.php';
	require_once 'upload.func.php';
	foreach ($_FILES as $val){
		$mes=uploadFile($val);
		echo $mes;
	}