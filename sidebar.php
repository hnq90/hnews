<div class="right sidebar" id="sidebar">
				<div class="section network-section">
					<div class="section-title">Tìm kiếm</div>
					<div class="section-content">
					<form method="get" action="">
						<input type="text" name="s" id="searchbox" value="gõ từ khóa vào đây" style="border: 1px dashed" onclick="this.value = '';">
						<input type="submit" value="Search">
					</form>
					</div>
				</div>

				<div class="section network-section">
					<div class="section-title">Bài xem nhiều nhất</div>
					<div class="section-content">
						<ul class="nice-list">
							<?php
								include('include/config.php');
								$query = "SELECT * FROM post ORDER BY num_view DESC LIMIT 5";
								//SELECT  `id` ,  `post_author` ,  `post_title` ,  `post_content` ,  `thumb` ,  `post_excerpt` ,  `category_id` ,  `post_date` ,  `num_view` ,  `keyword` ,  `num_comment` ,  `post_status` , `slug` FROM  `post` 
								$result = mysql_query($query) or die (mysql_error());

								//$i = 0;
								while($row = mysql_fetch_array($result)) {
									//$row['id'];
									echo "<li><a href=\"/hnews/post/".$row['id']."_".$row['slug'].".html\"/>".$row['post_title']."</a></li>";
									//$row['slug'];
									//$i++;
								}
							?>
						</ul>
					</div>
				</div>
				<div class="section network-section">
					<div class="section-title">Quảng cáo</div>
					<div class="section-content">
						<ul class="nice-list">
							<?php
								$queryads = "SELECT * FROM ads WHERE align=1";
								$resultads = mysql_query($queryads) or die("Fuck");
								while($row = mysql_fetch_array($resultads)) {
									$ad['ads']['name'] = $row['ads_name'];
									$ad['ads']['link'] = $row['ads_link'];
									$ad['ads']['img'] = $row['ads_img'];
								}
								?>
								<a href="<?php echo $ad['ads']['link']; ?>"><img src="<?php echo $ad['ads']['img']; ?>" alt="<?php echo $ad['ads']['name']; ?>"></a>
								<?php
							?>
						</ul>
					</div>
				</div>
			</div>