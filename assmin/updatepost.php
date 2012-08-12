<?php
session_start();

include_once('../include/config.php');

$newsID = $_POST['newsID'];
$tieude = $_POST['tieude'];
$chuyenmuc = $_POST['chuyenmuc'];
$trangthai = $_POST['trangthai'];
$noidung = $_POST['noidung'];
$tukhoa = $_POST['tukhoa'];
$rutgon = $_POST['rutgon'];
$thumb = $_POST['thumb'];
$slug = $_POST['slug'];

//$cur_date = date('Y-m-d H:i:s');

##start##
$query = "UPDATE post SET post_title='$tieude', post_content='$noidung', thumb='$thumb', post_excerpt='$rutgon', category_id='$chuyenmuc', keyword='$tukhoa', post_status='$trangthai', slug='$slug' WHERE id=".$newsID;
//echo $query;
$result = mysql_query($query) or die(mysql_error());
echo "Cập nhật thành công";
##end##

?>