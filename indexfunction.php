<?php
function getIP() {
	if (! empty ( $_SERVER ['HTTP_CLIENT_IP'] )) {
		$ip = $_SERVER ['HTTP_CLIENT_IP'];
	} elseif (! empty ( $_SERVER ['HTTP_X_FORWARDED_FOR'] )) {
		$ip = $_SERVER ['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER ['REMOTE_ADDR'];
	} 
	$ipx = (string)$ip;
	return $ipx;
}

function insertComment($id,$name,$content,$email,$ip) {
	$ip = getIP();
	$query = "INSERT INTO comment(postid, comment_name, comment_date, comment_content, comment_email, comment_ip) VALUES ('$id', '$name', NOW(), '$content', '$email', '$ip')";
	mysql_query($query) or die (mysql_error());
	echo "Ban gui comment thanh cong";
}

function querycomment($id) {
	$query = "SELECT `comment_id`, `comment_name`, `comment_date`, `comment_content`, `comment_email` FROM `comment` WHERE comment_approved=1 AND postid=".$id;
	$result = mysql_query($query) or die ("Fuck");
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
		$comment[$i]['name'] = $row['comment_name'];
		$comment[$i]['date'] = $row['comment_date'];
		$comment[$i]['content'] = $row['comment_content'];
		echo "<div style='font-size: 20px'>".$comment[$i]['name']."</div>";
		echo "on <em>".$comment[$i]['date']."</em>.";
		echo "<p style='border: 1px inset; width: 400px; height: 120px'>".$comment[$i]['content']."</p>";
	}
}
?>