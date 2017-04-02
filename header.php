<?php
	/* 'header.php' is included in many other PHP sources, so start_session() is placed here to minimize redundance.
	$_SESSION associative array maintains elements as variables that persist between server and client exchange,
	but only as long as $SESSION_ID is the same (ie, session is still alive). */
	session_start();	// Initiate and/or confirm $SESSION_ID cookie matches between server and client so variables 

	// Inititalize global constants.
	$_SESSION['SUCCESS'] = 1;
	$_SESSION['PASSWORD_FAILED'] = -1;
	$_SESSION['EMAIL_FAILED'] = -2;	
?>

<html>

<head>
	<title>Invest And Learn</title>
	<link rel="stylesheet" type="text/css" href="Styles/myStyles.css">
	<link rel="stylesheet" href="Styles/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="Images/favicon.png">
	<script src="Scripts/contactUs.js"></script>
</head>
<header>
	<div id="banner" class="dark-purple-background">
		<i id="banner-logo" class="fa fa-graduation-cap fa-5x cyan-text"></i>
		<div id="banner-text" class="white-text">Invest And Learn!</div>
		<nav id="banner-nav" class="nav-fonts white-text">
			<a onclick="contactUs()" class="white-text" alt="Contact Us">Contact Us | </a>
			<a href="aboutUs.php" class="white-text" alt="About Us">About Us | </a>
			<a href="LoginForm.php" class="secure cyan-text" alt="Member Login"><i class="fa fa-lock"></i> Member Login</a>
		</nav>
	</div>

	<nav id="main-menu-nav" class="nav-fonts">
		<a href="index.php" class="dark-purple-text" alt="Home">Home | </a>
		<a href="learn.php" class="dark-purple-text" alt="Learn To Invest">Learn | </a>
		<a href="calendar.php" class="dark-purple-text" alt="Calendar">Events Calendar | </a>
		<a href="blog.php" class="dark-purple-text" alt="Blog">Blog</a>
	</nav>

</header>

<body>
