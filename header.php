<?php
	/* Included in site pages for consistent markup and sharing of $_SESSION variables that keep track of state.
	 */

	/* Initiate and/or confirm $session_id cookie matches between server and client so that 
	all elements in $_SESSION array are retained.*/
	session_start();

	require_once 'Classes/KLogger.php';
	$log = new KLogger("tmp/log.txt", KLogger::DEBUG);

	// Inititalize $_SESSION constants.
	include("Constants.php");

	// Keep track of last activity on the site to close down the session and destroy it for future visitors.
	if ( isset($_SESSION['lastActivity'])  &&  ((time() - $_SESSION['lastActivity']) > $_SESSION['TIMEOUT']) ) {
		$log->LogDebug("Header.php: TIMED OUT at: " . time() . "\nLast Activity was: " . $_SESSION['lastActivity'] . "\n------------------");
		session_unset();
		session_destroy();
		header("Location: Timeout.php");
	}

	$_SESSION['lastActivity'] = time();
	$log->LogDebug("Header.php: Last Activity: " . $_SESSION['lastActivity'] . "\n------------------");

	// Initialize START states
	if (!isset($_SESSION['loginState'])) {
		$_SESSION['loginState'] = $_SESSION['START'];
		$log->LogDebug("Header.php: Initializing loginState to: " . $_SESSION['loginState'] . "\n------------------");
	}

?>

<html>

<head>
	<title>Invest And Learn</title>
	<link rel="stylesheet" type="text/css" href="Styles/myStyles.css">
	<link rel="stylesheet" href="Styles/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="Images/favicon.png">
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="Scripts/InvestAndLearn.js"></script>
</head>

<header>
	<div id="banner" class="dark-purple-background">
		<i id="banner-logo" class="fa fa-graduation-cap fa-5x cyan-text"></i>
		<div id="banner-text" class="white-text">Invest And Learn!</div>
		<nav id="banner-nav" class="nav-fonts white-text">
			<a onclick="contactUs()" class="white-text" alt="Contact Us">Contact Us | </a>
			<a href="AboutUsPage.php" class="white-text" alt="About Us">About Us | </a>
			<a href="JoinForm.php" class="secure white-text" alt="New Member Join">Join Club | </a>
			<?php
				if ($_SESSION['loginState'] == $_SESSION['SUCCESS']) {	  // Already logged in
					echo "<a href='LogoutHandler.php' class='cyan-text' alt='Logout'>Logout</a>";
				} else {
					echo "<a href='LoginForm.php' class='secure cyan-text' alt='Member Login'><i class='fa fa-lock'></i> Member Login</a>";
				}
			?>
		</nav>
	</div>

	<nav id="main-menu-nav" class="nav-fonts">
		<a href="index.php" class="dark-purple-text" alt="Home">Home | </a>
		<a href="LearnPage.php" class="dark-purple-text" alt="Learn To Invest">Learn | </a>
		<a href="CalendarPage.php" class="dark-purple-text" alt="Calendar">Events Calendar | </a>
		<a href="BlogPage.php" class="dark-purple-text" alt="Blog">Blog</a>

		<!-- The user's login status, or state, is assessed below and corresponding message rendered. -->
		<?php
			if ($_SESSION['loginState'] == $_SESSION['SUCCESS']) {
				echo "<div id='success-state' class='dark-purple-text login-state-msg'>Welcome " 
					. $_SESSION['userName'] 
					. "</div>";
			} else if ($_SESSION['loginState'] == $_SESSION['LOGGED_OUT']) {
				echo "<div id='logged-out-state' class='dark-purple-text login-state-msg'>Logged Out, Thanks For Visiting!</div>";
			} else if ($_SESSION['loginState'] == $_SESSION['TIMED_OUT']) {
				echo "<div id='timed-out-state' class='dark-purple-text login-state-msg'>*** You've Timed Out, Please Login Again</div>";
				$_SESSION['loginState'] = $_SESSION['START'];
			}
		?>
	</nav>

</header>

<body>