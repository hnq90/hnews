
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<meta name="description" content="<?php if(isset($des)) echo $des; ?>"/>
	<meta name="keywords" content="<?php if(isset($keyword)) echo $keyword; ?>" />
	<meta name="author" content="HuyNQ" />
	<link rel="stylesheet" type="text/css" href="/hnews/css/style2.css" media="screen" />
	<title><?php if(isset($title)) echo $title; else echo "hNews 0.1"; ?></title>
</head>
<body id="top">

<div id="site">
	<div class="center-wrapper">
		<div id="header">
			<div class="right" id="toolbar">
				<a href="#">CONTACT</a> | <a href="#">SITEMAP</a> | <a href="#">ADS</a>
			</div>
			<div class="clearer">&nbsp;</div>
			<div id="site-title">
				<h1><a href="/hnews/home">hNews</a> <span> / v1.0</span></h1>
			</div>
			<div id="navigation">
				<div id="main-nav">
					<?php include_once('menu.php'); ?>
					<div class="clearer">&nbsp;</div>
				</div>
				<hr />
			</div>
		</div>
