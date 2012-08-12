<?php
session_start();
$id = $_GET['id'];
require_once('include/config.php');
$query = "SELECT * FROM post WHERE id=".$id;
//SELECT  `id` ,  `post_author` ,  `post_title` ,  `post_content` ,  `thumb` ,  `post_excerpt` ,  `category_id` ,  `post_date` ,  `num_view` ,  `keyword` ,  `num_comment` ,  `post_status` , `slug` FROM  `post` 
$result = mysql_query($query) or die (mysql_error());
$numr = mysql_num_rows($result);
if($numr == 0) {
	echo "Không tìm thấy bài nào";
} else {
	while($row = mysql_fetch_array($result)) {

	$spost['author'] = $row['post_author'];
	$spost['title'] = $row['post_title'];
	$spost['content'] = $row['post_content'];
	$spost['category_id'] = $row['category_id'];
	$spost['post_date'] = $row['post_date'];
	$spost['num_view'] = $row['num_view'];
	$spost['keyword'] = $row['keyword'];
	$spost['num_comment'] = $row['num_comment'];
	$spost['slug'] = $row['slug'];
	$spost['num_view'] = $row['num_view'];
	}

	####Insert view####
	$newview = $spost['num_view']+1;
	$queryview = "UPDATE post SET num_view='$newview' WHERE id=".$id;
	mysql_query($queryview) or die("Fyck");

	###Author name###
	$queryauthor = "SELECT username FROM user WHERE id=".$spost['author'];
	$resultauthor = mysql_query($queryauthor);
	list($nameauthor) = mysql_fetch_array($resultauthor);
	$authorx = $nameauthor;

}
?>
<div class="main" id="main-two-columns">
	<div class="left" id="main-left">
		<div class="post">
			<div class="post-title"><h2><a href="#"><?php echo $spost['title']; ?></a></h2></div>
				<div class="post-date"><?php if($spost['post_date'] != "") echo "Gửi lúc: ".$spost['post_date']; else echo ""; ?> <?php if($spost['author']!="") echo " bởi ".$authorx; else echo "";?></div>
					<div class="post-body">
					<?php 
							echo $spost['content'];
						?>
					</div>
				</div>
				<div class="content-separator"></div>
				<?php include('comment.php'); ?>
			</div>
