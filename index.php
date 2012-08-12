<?php
include_once('include/config.php');
$queryheader = "SELECT `site_title`, `site_keyword`, `site_logo`, `site_description`, `isOn` FROM `site_config` WHERE site_id=1";
$resultheader = mysql_query($queryheader);
while ($row = mysql_fetch_array($resultheader)) {
	$title = $row['site_title'];
	$keyword = $row['site_keyword'];
	$logo = $row['site_logo'];
	$des = $row['site_description'];
	$isOn = $row['isOn'];
}
?>
<?php
if($isOn == 1) {
	require_once('header.php');
	require_once('content.php');
	require_once('sidebar.php');
	require_once('footer.php');
} else {
	echo "Đóng cửa bảo trì website.";
}
?>