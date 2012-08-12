<?php
$query = "SELECT * FROM `site_config` WHERE site_id=1";
$result = mysql_query($query) or die ("fuck");
while ($row = mysql_fetch_array($result)) {
	$title = $row['site_title'];
	$kw = $row['site_keyword'];
	$logo = $row['site_logo'];
	$des = $row['site_description'];
	$active = $row['isOn'];
}
function save() {
	$title = $_POST['sitetitle'];
	$keyword = $_POST['keyword'];
	$logo = $_POST['sitelogo'];
	$des = $_POST['description'];
	
	if($_POST['isActive'] == "on") {
		$active = 1;
	} else {
		$active = 0;
	}
	$query = "UPDATE `site_config` SET `site_title`='$title',`site_keyword`='$keyword',`site_logo`='$logo',`site_description`='$des',`isOn`='$active' WHERE 1";
	mysql_query($query) or die(mysql_error());
	echo "Update thành công. Hãy đợi 3s.";
	sleep(3);
	header("location: index.php?admin=config");
}
?>
<form method="post" action="index.php?admin=config&do=save">
<p>Tiêu đề:	<br/> <input type="text" name="sitetitle" value='<?php echo $title; ?>' style="width: 500px"></p>
<p>Keyword:	<br/><textarea name="keyword" cols=50 rows=5><?php echo $kw; ?></textarea></p>
<p>Logo:	<br/> <input type="text" name="sitelogo" value='<?php echo $logo; ?>' style="width: 500px"> </p>
<p>Mô tả:<br /> <textarea name="description" cols=50 rows=5><?php echo $des; ?></textarea></p>
<p>Mở website: <input type="checkbox" name="isActive" <?php if($active == 1) echo "checked"; ?>></p>
<p><input type="submit" value="Save"> </p>
</form>

<?php
if(isset($_GET['do'])) {
	save();
}
?>