<?php
session_start();
$_SESSION['loginState'] = 0;
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
			<a href="JoinForm.php" class="secure white-text" alt="New Member Join">Join Club | </a>
            <a href="LoginForm.php" class="secure cyan-text" alt="Member Login"><i class="fa fa-lock"></i> Member Login</a>
		</nav>

	</div>

    <nav id="main-menu-nav" class="nav-fonts">
		<a href="index.php" class="dark-purple-text" alt="Home">Home | </a>
		<a href="learn.php" class="dark-purple-text" alt="Learn To Invest">Learn | </a>
		<a href="calendar.php" class="dark-purple-text" alt="Calendar">Events Calendar | </a>
		<a href="blog.php" class="dark-purple-text" alt="Blog">Blog</a>
        <div id='login-state-msg' class='dark-purple-text'>You've been logged out.</div>

	</nav>
</header>

<body>

<?php
	include("MainContentMarkup.php");
?>
<!--<div class="main-content black-text">
    <img class="images" id="home-page-image" src="Images/blue-$$$.jpg" alt="Stacked Money">
	<div>
		<div id="home-page-content" class="dark-purple-text">
			<p>
				TBD ... A paragraph will go here that's aim is to motivate
				visitors to learn more about saving, growing, and investing money purposefully.
			</p>
			<p>
				TBD ... A paragraph will go here that's aim is to motivate
				visitors to learn more about saving, growing, and investing money purposefully.
			</p>
			<p>
				TBD ... A paragraph will go here that's aim is to motivate
				visitors to learn more about saving, growing, and investing money purposefully.
			</p>
			<p>
				TBD ... A paragraph will go here that's aim is to motivate
				visitors to learn more about saving, growing, and investing money purposefully.
			</p>
		</div>
		<button id="testimonials-button" class="cyan-background dark-purple-text"><a href="testimonials.php"><i class="fa fa-play"></i> Testimonials</a></button>
	</div>

</div>-->

<?php
    include("footer.php");
?>