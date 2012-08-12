<?php #require('function.php'); ?>
<?php require_once('header.php'); ?>
<?php
session_start();
include('include/config.php');

if(isset($_GET['id'])) {
	$catID = $_GET['id'];
	$query = "SELECT * FROM post WHERE category_id='$catID' ORDER BY post_date DESC";
	$_SESSION['query2'] = $query;
	//SELECT  `id` ,  `post_author` ,  `post_title` ,  `post_content` ,  `thumb` ,  `post_excerpt` ,  `category_id` ,  `post_date` ,  `num_view` ,  `keyword` ,  `num_comment` ,  `post_status` , `slug` FROM  `post` 
	$result = mysql_query($query) or die (mysql_error());
	$num_record = mysql_num_rows($result); //tổng số bản ghi
	//echo $num_record;
	if($num_record == 0) {
		echo "Chuyên mục này chưa có bài nào";
	} else {
		$per_page = 5; //số record mỗi trang
		$num_page = ceil($num_record / $per_page); //tổng số trang

		if(isset($_GET['page'])) {
			$pagenow = $_GET['page']; //số trang hiện tại
		}
		else { 
			$pagenow = 1; 
		}
		if(isset($_SESSION['query2'])) {
			$query2 = $_SESSION['query2'];
			$limit = $per_page * ($pagenow - 1);
			$query2 = $query." LIMIT ".$limit.",5";
			$result2 = mysql_query($query2) or die (mysql_error());
			//echo $query2;
			$i = 0;
			while($row = mysql_fetch_array($result2)) {
				$post[$i]['id'] = $row['id'];
				$post[$i]['title'] = $row['post_title'];
				$post[$i]['thumb'] = $row['thumb'];
				$post[$i]['content'] = $row['post_content'];
				$post[$i]['excerpt'] = $row['post_excerpt'];
				$post[$i]['slug'] = $row['slug'];
				$i++;
			}
		}
	}
}
?>
		<div class="main" id="main-two-columns">
			<div class="left" id="main-left">
				<?php 
				for ($i2 = 0; $i2<count($post); $i2++) {
					?>
					<div class="post">
					<a href="#"><img src="<?php 
					if($post[$i2]['thumb'] != "") {
						echo $post[$i2]['thumb']; 
					} else {
						echo "http://vietseo.vn/wp-content/themes/daily/images/default-thumb.gif";
					}
 					
					?>" width="125px" height="125px" alt="" class="left bordered" /></a>
					<h3><a href="/hnews/post/<?php echo $post[$i2]['id']; ?>_<?php echo $post[$i2]['slug']; ?>.html"><?php echo $post[$i2]['title']; ?></a></h3>
					<p><?php 
						if($post[$i2]['excerpt'] != "") {
							echo $post[$i2]['excerpt']; 	
						} else {
							echo substr($post[$i2]['content'],0,100)."...";
						}
					?></p>
					<a href="/hnews/post/<?php echo $post[$i2]['id']; ?>_<?php echo $post[$i2]['slug']; ?>.html" class="more">Đọc tiếp &#187;</a>
					<div class="clearer">&nbsp;</div>
				</div>
				<div class="content-separator"></div>	
				<?php
			}
			?>			
			<?php 
			for ($i = 1; $i<= $num_page; $i++) {
				echo "<a href='#'>[".$i."]</a>"; 
			}
			?>	
			</div>
<?php require_once('sidebar.php'); ?>
<?php require_once('footer.php'); ?>