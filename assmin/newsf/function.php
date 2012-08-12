<?php
function edit($newsID) {
	$querynews = "SELECT * FROM post WHERE id=".$newsID;
	$resultnews = mysql_query($querynews) or die('Fuk');
	while ($row2 = mysql_fetch_array($resultnews)) {
			$title1 = $row2['post_title'];
			$noidung1 = $row2['post_content'];
			$thumb1 = $row2['thumb'];
			$excerpt1 = $row2['post_excerpt'];
			$catID1 = $row2['category_id'];
			$kw1 = $row2['keyword'];
			$status1 = $row2['post_status'];
			$slug1 = $row2['slug'];
		}
		//echo $title.$noidung.$thumb1.$excerpt.$catID.$kw.$status.
		//echo $slug1;
	include ('formedit.php');
	//echo "edit";
}

function delete($newsID) {
	$querydelete = "DELETE FROM post WHERE id=".$newsID;
	mysql_query($querydelete);
	echo "Xóa thành công !";
	showpost();
}

function showpost(){
	?>
<div id='list' style='display: block'>
	<table width="100%" border="1">
	<tr>
		<td>ID</td>
		<td>Tên</td>
		<td>Chuyên mục</td>
		<td>Trạng Thái</td>
		<td>Sửa</td>
		<td>Xóa</td>
	</tr>
	<?php
	$query_post = "SELECT * FROM post";
	$resultq = mysql_query($query_post);
	while($row = mysql_fetch_array($resultq)) {
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['post_title']."</td>";
		echo "<td>";
		$querycat = "SELECT category_name FROM category WHERE id=".$row['category_id'];
		$resultcat = mysql_query($querycat) or die ("Fuck");
		list($catname) = mysql_fetch_array($resultcat);
		echo $catname;
		echo "</td>";
		echo "<td>";
		if($row['post_status'] == 0) {
			echo "Nháp";
		} else {
			echo "Đã xuất bản";
		}
		echo "</td>";
		echo "<td><a href='index.php?admin=editnews&handle=edit&newsID=".$row['id']."'>Sửa</a></td>";
		echo "<td><a href='index.php?admin=editnews&handle=delete&newsID=".$row['id']."'>Xóa</a></td>";
		echo "</tr>";
	}
	?>
</table>
</div>
<?php
}
?>