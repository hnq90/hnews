<?php
session_start();
if(isset($_GET['enteredcode'])) {
	if($_SESSION["security_code"] == $_GET['enteredcode']) {
		echo "Good";
	} else {
		echo "Bad";
	}
}
?>