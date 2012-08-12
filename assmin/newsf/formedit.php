<!-- TinyMCE -->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		//mode : "textareas",
		mode : "specific_textareas",
        editor_selector : "hText2",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		]
	});
</script>
<!-- /TinyMCE -->

<script type="text/javascript">
/* function show(x) {
	var x2 = document.getElementById(x);
	if(x2.style.display == 'none') {
		x2.style.display = 'block';
	}
}
function hide(x) {
	var x3 = document.getElementById(x);
	if(x3.style.display == 'block') {
		x3.style.display = 'none';
	}
}

function updatepost() {
	var t0 = document.getElementById('id').value;
	var t1 = document.getElementById('tieude').value;
	var t2 = tinyMCE.get('noidung').getContent({format : 'raw'});
	var t3 = document.getElementById('rutgon').value;
	var t4 = document.getElementById('tukhoa').value;
	var t55 = document.getElementById('chuyenmuc');
	var t5 = t55.options[t55.selectedIndex].value;
	var t66 = document.getElementById('trangthai');
	var t6 = t66.options[t66.selectedIndex].value;
	var t7 = document.getElementById('slug').value;
	var t8 = document.getElementById('thumb').value;

	var url = 'updatepost.php';
	var params = "tieude="+t1+"&noidung="+t2+"&rutgon="+t3+"&tukhoa="+t4+"&chuyenmuc="+t5+"&trangthai="+t6+"&slug="+t7+"&thumb="+t8+"&newsID="+t0;

	if (t1 == '' || t2 == '' || t3 == '' || t4 == '' || t7 == '' || t8 == '') {
		alert('Bạn chưa điền đủ vào các ô');
		//alert(t1+t2+t3+t4+t5+t6);
	} else {
		//alert(t1+t2+t3+t4+t5+t6+t7+t8);
		var ajax;
		try {
			ajax = new XMLHttpRequest;//khai bao XML Object (Firefox, Chrome)
		}
		catch (e) {
			try {
				ajax = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch (e) {
				try {
						ajax = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e) {
					alert("Error");
				}
			}
		}

		ajax.open("POST", url, true);

		//Send the proper header information along with the request
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.setRequestHeader("Content-length", params.length);
		ajax.setRequestHeader("Connection", "close");

		ajax.onreadystatechange = function()
		{
			if(ajax.readyState == 4 && ajax.status == 200)
			{
				document.getElementById('notice').innerHTML = "<em>"+ajax.responseText+"</em>";
				alert('Bạn đã sửa bài thành công');
				//window.location.reload();
			} else {
				document.getElementById('notice').innerHTML = "<img src=\"../images/loading.gif\">";
			}
		}
		ajax.send(params);

	}

}*/
function generateslug() {
	var ajax = new XMLHttpRequest;
	
	var title = document.getElementById('tieude').value;
	var slugx = document.getElementById('slug').value;
	if(slugx == "") {
		ajax.open("GET","slug.php?tieude="+title,true);
		ajax.send(null);
		
		
		ajax.onreadystatechange = function()
		{
			if(ajax.readyState==4)
			{
				document.getElementById('slug').value = ajax.responseText;	
			}
		}
	} else {
		return;
	}
}
</script>
<!-- <a href='#' onclick="show('add-new');hide('list');" style='float: left'><strong>Viết Bài Mới</strong></a>
<a href='#' onclick="show('list');hide('add-new')" style='margin-left: 10px'><strong>Sửa/Xóa Bài</strong></a><br />-->

<div id='add-new' style='display: block'>
	<form method="post" action="index.php?admin=editnews&handle=suabai">
		<input type='hidden' id='id' name="newsID" value='<?php echo $newsID ?>'>
		<p><strong>Tiêu đề bài viết</strong><br /> <input type='text' name='tieude' id='tieude' style='width: 400px' value='<?php echo $title1; ?>' onchange='generateslug();'></p>
		<p><strong>Tùy chỉnh link bài viết</strong><br /><em>Nếu bạn không đặt, link sẽ được tự động generate</em><br /> <em>http://linkweb.com/post/id_</em><input type='text' name='slug' id='slug' style='width: 300px' value='<?php echo $slug1; ?>'><em>.html</em></p>
		<p><strong>Chọn chuyên mục: </strong>
			<?php 
			echo "<select name='chuyenmuc' id='chuyenmuc'>";
			//Get toan bo danh sach chuyen muc
			$query = "SELECT * FROM category";
			$result = mysql_query($query) or die ('Fuck');
			while ($row = mysql_fetch_array($result)) {
				if($catID1 == $row['id']) {
					echo "<option value='".$row['id']."' selected>".$row['category_name']."</option>";
				} else {
					echo "<option value='".$row['id']."'>".$row['category_name']."</option>";
				}
			}
			echo "</select>";
			?>
		</p>
		<p><strong>Chọn trạng thái cho bài viết:</strong>
			<select name='trangthai' id='trangthai'>
				<?php
				if($status1 == 1) {
					echo "<option value='0'>Nháp</option>
				<option value='1' selected>Xuất bản</option>";
				} else {
					echo "<option value='0' selected>Nháp</option>
				<option value='1'>Xuất bản</option>";
				}
				?>
			</select>
		</p>
		<p><strong>Nội dung</strong><br /> <textarea name='noidung' class='hText2' id='noidung'><?php echo $noidung1; ?></textarea></p>
		<p><strong>Điền link thumb: </strong><br /><em>(Ảnh đại diện cho bài ngoài trang chủ. Ảnh phải nằm trên host)</em><br /><input type='text' name='thumb' id='thumb' style='width: 500px' value='<?php echo $thumb1; ?>'></p>
		<p><strong>Nội dung rút gọn</strong><br /><em>(Dành cho ngoài trang chủ)</em><br /><textarea name='rutgon' id='rutgon' wrap=hard cols=70 rows=5><?php echo $excerpt1; ?></textarea></p>
		<p><strong>Điền từ khóa cho bài: </strong><br /><em>(Dành cho SEO)</em><br /><textarea name='tukhoa' id='tukhoa' cols=70 rows=3><?php echo $kw1; ?></textarea></p>
		<!--<p><input type='button' value='Cập Nhật' style='color: white; background: black' onclick='updatepost();'></p>-->
		<p><input type='submit' value='Cập Nhật' style='color: white; background: black'></p>
	</form>
</div>

<!--<div id='notice'>
</div> -->