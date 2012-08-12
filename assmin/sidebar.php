<?php
if(!isset($NOTDIRECT)) {
    die ("Fuck you");   
} else {   
?>
	<script type="text/javascript">
	function hideshow(x) {
		var x = document.getElementById(x);
		if(x.style.display == 'block') {
			x.style.display = 'none';
		} else {
			x.style.display = 'block';
		}
	}
	</script>
	<!-- Start Sidebar -->
	<div id="list4">
	<ul>
	<li><a href='#' onclick="hideshow('submenu1');">Quản Lý Ads</a></li>
	<div id='submenu1' class='submenu'>
		<li><a href='index.php?admin=ads&do=editads'>Sửa Ads</a></li>
		<li><a href='index.php?admin=ads&do=addads'>Thêm Ads</a></li>
	</div>
	<li><a href='#' onclick="hideshow('submenu2');">Quản Lý Bài Viết</a></li>
	<div id='submenu2' class='submenu'>
		<li><a href='index.php?admin=addnews'>Gửi Bài</a></li>
		<li><a href='index.php?admin=editnews'>Sửa Bài</a></li>
	</div>
	<li><a href='index.php?admin=categories'>Quản Lý Chuyên Mục</a></li>
	<li><a href='index.php?admin=users'>Quản Lý User</a></li>
	<li><a href='index.php?admin=comments'>Quản Lý Bình Luận</a></li>
	<li><a href='index.php?admin=config'>Cấu Hình Web</a></li>
	</ul>
	</div>
	<!-- End Sidebar -->
	<?php
	}
	?>