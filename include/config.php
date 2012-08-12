<?php
	error_reporting(E_ALL &~ E_NOTICE);
	//Begin Config
	$server = 'localhost';
	$user = 'root';
	$pass = '123';
	$db = 'hnews';
	//End Config
	$con = mysql_connect($server, $user, $pass) or die ("Kết nối server không thành công");
	mysql_select_db($db, $con) or die ("Kết nối tới database thất bại");
	mysql_query("SET NAMES 'UTF8'");
?>