<?php
// ������ļ��ϴ�
	require_once '../lib/string.func.php';
	require_once 'upload.func.php';
	foreach ($_FILES as $val){
		$mes=uploadFile($val);
		echo $mes;
	}