<?php
session_start();
include('include/config.php');
$query = "SELECT * FROM post ORDER BY post_date DESC";
$result = mysql_query($query) or die (mysql_error());
while($row = mysql_fetch_array($result)) {
	echo $row['post_title'];
	echo "<br />";
	echo $row['post_excerpt'];
	echo "<br />";
	echo "<br />";
}
?>

<?php
function create_slug($string){
   $string = preg_replace( '/[«»""!?,.!@£$%^&*{};:()]+/', '', $string );
   $string = strtolower($string);
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}
	if(isset($_GET['title'])) {
		$title = $_GET['title'];
		$slug = create_slug($title);
		echo $slug;
		}
?>