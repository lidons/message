<?php
// session_start();
// require_once '../lib/mysql.func.php';
// require_once '../core/admin.inc.php';
// require_once '../lib/common.func.php';
// header('Content-type:text/html;charset=utf8');
// connect();
require_once '../include.php';
$username=$_POST['username'];
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$code=$_SESSION['verify'];
$autoFlag=$_POST['autoFlag'];
// var_dump($verify);
// var_dump($code);
// exit();
 
if($verify==$code){
	$sql="select * from imooc_admin where username='{$username}' and password='{$password}'" ;
	$row=checkAdmin($sql);
// 	print_r($res);
//如果选择了一周内自动登录
if($autoFlag){
	setcookie("adminID",$row['id'],time()+7*24*3600);
	setcookie("adminName",$row['username'],time()+7*24*3600);
	
}
 	if($row){
 		$_SESSION['adminName']=$row['username'];
 		$_SESSION['adminId'] = $row['id'];
//  		header('location:index.php');
		alertMes("恭喜你，登录成功", "index.php");
 	}else{
 		alertMes("登录失败，请重新登录", "login.php");
 	}
}else{
	alertMes("验证码错误，请从新输入","login.php");
}