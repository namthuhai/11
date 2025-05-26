<?php
session_start();
include_once 'cauhinh.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');
$_login = isset($_login) ? $_login : null;
include_once 'config.php';
$_user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
if($_user != null)
{
	$_login = "on";
	$user_arr = _fetch("SELECT * FROM users Where username='$_user'");
	if(count($user_arr) <= 0){header("location:/?out");}
	$id = htmlspecialchars($user_arr['id']);
	$_username = htmlspecialchars($user_arr['username']);
	$_password = htmlspecialchars($user_arr['password']);
	$_phone = htmlspecialchars($user_arr['phone']);
//	$_coin = $user_arr['coin'];
	$_luong = $user_arr['luong'];
	$isOnline = $user_arr['online'];
	$Is_Admin_WEB= $user_arr['Is_Admin_WEB'];
	$ngoc = $user_arr['balance'];
	$_status = htmlspecialchars($user_arr['activated']);
	$_SESSION['username'] = $_user;
	switch($isOnline){
		case '1':
			$online = '<span style="color:#19ff94;font-weight: bold;">Online';
			break;
		case '0':
			$online = '<span style="color:#999490;font-weight: bold;">Offline';
	
			break;
	}
	switch($_status){
		case '1':
			$_status_check = '<span style="color:#19ff94;font-weight: bold;">Đã Kích Hoạt';
			break;
		case '0':
			$_status_check = '<span style="color:#999490;font-weight: bold;">Chưa Kích Hoạt';
			break;
	}
}
else
{
	$_login = null;
}
if (isset($_GET['out']))
{
	session_destroy();
	header("location:/");
}
?>




