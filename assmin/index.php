<?php 
ob_start();
session_start();
require_once('../include/config.php');
$NOTDIRECT = true;
error_reporting(0);
?>
<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="author" content="HuyNQ" />
    <link href="../css/styles.css" rel="stylesheet" media="screen" />
	<title>Control Panel - HNews</title>
</head>

<body>

<?php
if(!isset($_SESSION['user_id'])) {
    include('login_form.php');
} else if (isset($_SESSION['user_id'])) {
    include('main.php');
}
?>
<div id="result2">
<?php
if(isset($_POST['user']) && isset($_POST['pwd'])) {
    $user = $_POST['user'];
    $pass = md5($_POST['pwd']);
    $ope = $_POST['ope'];
    $result = $_POST['result'];

    $query = "SELECT * FROM user WHERE username='$user' AND password='$pass'";
    $result2 = mysql_query($query);

    $numrow = mysql_num_rows($result2);
    if ($numrow == 1) {
        if($result == $ope) {
		while($row = mysql_fetch_array($result2)) {
			$uid = $row['id'];
			$group = $row['group'];
			$_SESSION['user_id'] = $uid;
			$_SESSION['group'] = $group;
		}
        header('refresh: 0; url=index.php');   
        }
        elseif ($result != $ope) { 
            echo "You do not pass Anti-Spam.<br />"; 
        }
    } else { 
        if ($result != $ope) { 
            echo "You didn't pass Anti-Spam.<br />"; 
        }
        echo "Invalid login attempt. Your IP is recorded. Take care.";
    }
}
?>
</div>
</body>
</html>