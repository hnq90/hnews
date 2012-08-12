<?php
session_start();

include_once('../include/config.php');

$tieude = $_POST['tieude'];
$chuyenmuc = $_POST['chuyenmuc'];
$trangthai = $_POST['trangthai'];
$noidung = $_POST['noidung'];
$tukhoa = $_POST['tukhoa'];
$rutgon = $_POST['rutgon'];
$thumb = $_POST['thumb'];
$slug = $_POST['slug'];
$author = $_SESSION['user_id'];

//$cur_date = date('Y-m-d H:i:s');

##start##
$query = "INSERT INTO post(post_author, post_title, post_content, thumb, post_excerpt, category_id, post_date, keyword, post_status, slug) VALUES ('$author','$tieude','$noidung','$thumb','$rutgon','$chuyenmuc',NOW(),'$tukhoa','$trangthai','$slug')";
//echo $query;
$result = mysql_query($query) or die(mysql_error());
echo "Gửi bài thành công";
##end##

?>