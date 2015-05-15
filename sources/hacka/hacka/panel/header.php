<?php 
session_start();
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Document title</title>
	<link rel="stylesheet" href="css/normalize.css" type="text/css" />
	<link rel="stylesheet" href="css/masterStyle.css" type="text/css" />
	<meta name="keywords" content="" />	
	<meta name="generator" content="" />	
	<link rel="shortcut icon" href="media/images/favicon.ico">
	<link rel="icon" href="media/images/favicon.ico">
	<link rel="stylesheet" href="css/fontello-embedded.css">
	<link rel="stylesheet" href="css/fontello-ie7.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<!--[if lt IE 9]>
		<script src="js/html5shiv-v3.7.0.js"></script>
	<![endif]-->
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>	
    <script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>	
    <script src="js/panel.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
	$(window).load(function(){
		$(".content").mCustomScrollbar({
			theme:"dark-3",
			scrollButtons:{
				enable:true
			}
		});
    });
	});
	</script>
</head>
<body>
	<div class="page-wrap">
		<div class="mainWrapper clearfix">
			<aside class="userSidebar">
				<header>
					<i class="icon-user"></i>
					<b>سلام <?php echo $_SESSION['usernamefamily']; ?></b>
				</header>
				<ul>
					<li>
						<a href="index.php" class="current">
							<i class="icon-edit"></i>
							<b>ثبت نام در رویداد</b>
						</a>
					</li>
					<li>
						<a href="archive.php">
							<i class="icon-archive"></i>
							<b>آرشیو رویداد</b>
						</a>
					</li>
					<li>
						<a href="passwordmgmt.php">
							<i class="icon-key"></i>
							<b>تغییر پسورد</b>
						</a>
					</li>
					<li>
						<a href="logout.php">
							<i class="icon-power"></i>
							<b>خروج</b>
						</a>
					</li>
				</ul>
			</aside>