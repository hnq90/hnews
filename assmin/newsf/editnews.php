<?php
error_reporting(E_ALL);
include('function.php');
?>

<?php
if(isset($_GET['handle'])) {
	$thaotac = $_GET['handle'];
	if(isset($_GET['newsID'])) 
		$newsID = $_GET['newsID'];
	switch($thaotac) {
		case 'edit':
			edit($newsID);
			//echo "edit bài viết";
			break;
		case 'delete':
			delete($newsID);
			//echo "xoa bai viet";
			break;
		case 'suabai':
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
			showpost();
			##end##
			break;
	}
} else {
	showpost();
}
?>