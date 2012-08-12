<?php
	require_once('header.php');
	?>
	
	<?php
	$kws = $_GET['s'];
	
	require_once('sidebar.php');
	require_once('footer.php');
?>

<div class="main" id="main-two-columns">
	<div class="left" id="main-left">
		<div class="post">
			<div class="post-title"><h2><a href="#"><?php echo $spost['title']; ?></a></h2></div>
				<div class="post-date"><?php if($spost['post_date'] != "") echo "Gửi lúc: ".$spost['post_date']; else echo ""; ?> <?php if($spost['author']!="") echo " bởi ".$authorx; else echo "";?></div>
					<div class="post-body">
					<?php 
							//echo $spost['content'];
						?>
					</div>
				</div>
				<div class="content-separator"></div>
				</div>