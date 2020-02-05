<?php
if (!isset($_SESSION)) session_start();
//unset($_SESSION['giohang']);
$a = isset($_SESSION['giohang'])?$_SESSION['giohang']: array();
//a bien trung gian de thao tac cho nhanh
$action = isset($_REQUEST['action'])?$_REQUEST['action']:'them';
$masp = isset($_REQUEST['masach'])?$_REQUEST['masach']:'';
$soluong = isset($_REQUEST['soluong'])?$_REQUEST['soluong']:1;
$soluong= intval($soluong);
if ($action=='them')
{
	if (isset($a[$masp]))	$a[$masp] += $soluong;
	else $a[$masp]=$soluong;
}
if ($action=='xoa')
{
	unset($a[$masp]);
}

if ($action=='sua')
{
	if ($soluong<=0) unset($a[$masp]);
	else 	$a[$masp]=$soluong;
}

$_SESSION['giohang']= $a;
//print_r($a);
header('location:hienthigiohang.php');