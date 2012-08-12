<a href="?admin=categories&do=form"><strong>Thêm Chuyên Mục Mới</strong></a><br /><br />
<!--
<script type="text/javascript">
function showhide(x) {
	var x2 = document.getElementById(x);
	if(x2.style.display == 'block') {
		x2.style.display = 'none';
	} else {
		x2.style.display = 'block';		
	}
}
</script>
	<div id='add-form' style='display: none'>
	</div> -->
<?php
if(isset($_GET['do'])) {
	switch ($_GET['do']) {
		case 'form':
			echo "<form action='index.php?admin=categories&do=save' method='post'>
			<p>Tên Chuyên Mục: <input type='text' name='cmTen'></p>
			<p>Chuyên Mục Cha: <select name='cmCha'>";
			//Get toan bo danh sach chuyen muc
			$query = "SELECT * FROM category WHERE ownercategory=0";
			$result = mysql_query($query) or die ('Fuck');
			while ($row = mysql_fetch_array($result)) {
				echo "<option value='".$row['id']."'>".$row['category_name']."</option>";
			}
			echo "<option value='0' selected>Là Chuyên Mục Cha</option>";
			echo "</select></p>
			<p><input type='submit' value='Lưu'></p>
			</form>";
			break;
		//SAVE NEW CATEGORY
		case 'save':
			$tencm = $_POST['cmTen'];
			$cmCha = $_POST['cmCha'];
			$query = "INSERT INTO category(category_name,ownercategory) VALUES('$tencm','$cmCha')";
			mysql_query($query) or die('Die');
			echo "Thêm Chuyên Mục Mới Thành Công";
			break;

		case 'edit':
				$ID = $_GET['cmID'];
				$query = "SELECT * FROM category WHERE id=".$ID;
				$result = mysql_query($query) or die ('Fuck');
				list($cmID,$cmTen,$cmCha) = mysql_fetch_array($result);
				echo "<form action='index.php?admin=categories&do=update&cmID=$ID' method='post'>";
				//echo "<input type='hidden' name='cmID' value='$ID'>";
				echo "<p>Tên Chuyên Mục: <input type='text' name='cmTen' value='".$cmTen."'></p>";
				echo "<p>Chuyên Mục Cha: <select name='cmCha'>";
				//Get toan bo danh sach chuyen muc
				$query2 = "SELECT * FROM category WHERE ownercategory=0";
				$result2 = mysql_query($query2) or die ('Fuck');
				if($cmCha == 0) {
						echo "<option value='0' selected>Là Chuyên Mục Cha</option>";
				} else {
					while ($row2 = mysql_fetch_array($result2)) {
						
						if ($cmCha == $row2['id']) {
							echo "<option value='".$row2['id']."' selected>".$row2['category_name']."</option>";
						}
						else {
							echo "<option value='".$row2['id']."'>".$row2['category_name']."</option>";	
						}
					}
				}
				echo "</select></p>";
				echo "<p><input type='submit' value='Lưu'></p>";
				echo "</form>";
			break;

		case 'delete';
			//code
			$query = "DELETE FROM category WHERE id=".$_GET['cmID'];
			mysql_query($query) or die('Fuck');
			echo "Xóa thành công";
			break;

		case 'update':
			//code
			$cmTen = $_POST['cmTen'];
			$cmCha = $_POST['cmCha'];
			$query = "UPDATE category SET category_name='".$cmTen."', ownercategory='".$cmCha."' WHERE id=".$_GET['cmID'];
			mysql_query($query) or die('Fuck');
			echo "Cập nhật thành công";
			break;
	}
}
?>
<table width="100%" border="1">
	<tr>
		<td>ID</td>
		<td>Tên</td>
		<td>Sửa</td>
		<td>Xóa</td>
	</tr>
<?php
//include('config.php');
//Danh sach chuyen muc cha
$query = "SELECT * FROM category WHERE ownercategory=0";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)) {
	echo "<tr>";
	echo "<td>".$row['id']."</td>";
	echo "<td>".$row['category_name']."</td>";
	echo "<td><a href='index.php?admin=categories&do=edit&cmID=".$row['id']."'>Sửa</a></td>";
	echo "<td><a href='index.php?admin=categories&do=delete&cmID=".$row['id']."'>Xóa</a></td>";
	echo "</tr>";
	//Danh sach chuyen muc con
	$query2 = "SELECT * FROM category WHERE ownercategory=".$row['id'];
	$result2 = mysql_query($query2) or die('Fuck2');
	while($row2 = mysql_fetch_array($result2)) {
		echo "<tr>";
		echo "<td>".$row2['id']."</td>";
		echo "<td>--- ".$row2['category_name']."</td>";
		echo "<td><a href='index.php?admin=categories&do=edit&cmID=".$row2['id']."'>Sửa</a></td>";
		echo "<td><a href='index.php?admin=categories&do=delete&cmID=".$row2['id']."'>Xóa</a></td>";
		echo "</tr>";
	}
}
?>
</table>