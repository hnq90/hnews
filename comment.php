<?php
require_once('indexfunction.php');

if($spost['num_comment'] == 0) {
	echo "Hãy là người comment đầu tiên :D";
} else {
	echo "Khung bình luận";
}
#
#
#INSERT INTO `comment`(`comment_name`, `comment_content`, `comment_email`, `comment_ip`, `comment_date) 
#VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
#
#
?>
<script type="text/javascript">
function checkf() {
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var content = document.getElementById('content').value;

	if(name == '' || email == '' || content == '') {
		return false;
	} else {
		return true;
	}
}
</script>
<form action="<?php echo $self; ?>" method="post" onsubmit="checkf();">
<p>Tên bạn: <input type="text" name="name" id='name' style="border: 1px inset"></p>
<p>Địa chỉ Email: <input type="text" id='email' name="email" style="border: 1px inset"></p>
<p><textarea cols=50 rows=7 name="cmContent" id='content'></textarea>
<p>Anti-spam: <em>Thủ đô Việt Nam là: </em> <input type="text" name="question" style="border: 1px inset"> </p>
<p><input type="submit" name="Gửi bình luận" style="background: black; color: white"></p>
</form>
<br />
<br />

<?php 
	querycomment($id);
?>
<?php
if(!empty($_POST)) {
	$ipx = getIP();
	$namex = $_POST['name'];
	$emailx = $_POST['email'];
	$contentx = $_POST['cmContent'];
	if($namex != '' && $emailx != '' && $contentx != '') {
		insertComment($id,$namex,$contentx,$emailx,$ipx);	
	} else {
		echo "Bạn chưa điền đủ";
	}
	
}
?>