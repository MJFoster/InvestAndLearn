<?php
	/* 'header.php' is included in many other PHP sources, so start_session() is placed here to minimize redundance.
	$_SESSION associative array maintains elements as variables that persist between server and client exchange,
	but only as long as $SESSION_ID is the same (ie, session is still alive). */

	// session_start();	// Initiate and/or confirm $SESSION_ID cookie matches between server and client.
	session_start();

	require_once 'Classes/KLogger.php';
	$log = new KLogger("tmp/log.txt", KLogger::DEBUG);

	// Inititalize $_SESSION constants.
	$_SESSION['START'] = 0;
	$_SESSION['SUCCESS'] = 1;
	$_SESSION['PASSWORD_FAILED'] = -1;
	$_SESSION['EMAIL_FAILED'] = -2;	
	$_SESSION['ADD_FAILED'] = -3;
	$_SESSION['LOGGED_OUT'] = -4;
	$_SESSION['ADD_RECORD_FAILED'] = "Could not add record to database.";
	$_SESSION['EMAIL_FAILED_MSG'] = "Email Not Found, Try again.";
	$_SESSION['PASSWORD_FAILED_MSG'] = "Password Not Found, Try again.";
	$_SESSION['PASSWORD_PATTERN'] = "(([0-9]|[A-Z]|[a-z]){5,10}){1}";
	$_SESSION['TIMEOUT'] = 1800;	// Timeout in 30 minutes.

	// Keep track of last activity on the site to close down the session and destroy it for future visitors.
	if ( isset($_SESSION['lastActivity'])  &&  ((time() - $_SESSION['lastActivity']) > $_SESSION['TIMEOUT']) ) {
		$log->LogDebug("header.php: TIMED OUT at: " . time() . "\nLast Activity was: " . $_SESSION['lastActivity'] . "\n------------------");
		session_unset();
		session_destroy();
		header("Location: LogoutPage.php");
	}
	$_SESSION['lastActivity'] = time();
	$log->LogDebug("header.php: Last Activity: " . $_SESSION['lastActivity'] . "\n------------------");

	// Initialize START states
	if (!isset($_SESSION['loginState'])) {
		$_SESSION['loginState'] = $_SESSION['START'];
		$log->LogDebug("header.php: Initializing loginState to: " . $_SESSION['loginState'] . "\n------------------");
	}
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
			<?php
				if ($_SESSION['loginState'] == $_SESSION['SUCCESS']) {	  // Already logged in
					echo "<a href='logout.php' class='cyan-text' alt='Logout'>Logout</a>";
				} else {
					echo "<a href='LoginForm.php' class='secure cyan-text' alt='Member Login'><i class='fa fa-lock'></i> Member Login</a>";
				}
			?>
		</nav>


	</div>

	<nav id="main-menu-nav" class="nav-fonts">
		<a href="index.php" class="dark-purple-text" alt="Home">Home | </a>
		<a href="learn.php" class="dark-purple-text" alt="Learn To Invest">Learn | </a>
		<a href="calendar.php" class="dark-purple-text" alt="Calendar">Events Calendar | </a>
		<a href="blog.php" class="dark-purple-text" alt="Blog">Blog</a>
		<?php
			if ($_SESSION['loginState'] == $_SESSION['SUCCESS']) {
				echo "<div id='login-state-msg' class='dark-purple-text'>Welcome " 
					. $_SESSION['userName'] 
					. "</div>";
			} else if ($_SESSION['loginState'] == $_SESSION['LOGGED_OUT']) {
				echo "<div id='login-state-msg' class='dark-purple-text'>Thanks For Visiting!</div>";
			}
		?>
	</nav>

</header>

<body>
