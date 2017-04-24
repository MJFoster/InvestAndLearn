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
		// setcookie("TimedOut", 1);		// $_COOKIE['TimedOut'] to be accessed by jQuery before any form submissions.	
		// $timeout = $_COOKIE["TimedOut"];	
		// $log->LogDebug("Header.php: TimeOut Cookie is: " . $timeout . "\n");
		$log->LogDebug("Header.php: TIMED OUT at: " . time() . "\nLast Activity was: " . $_SESSION['lastActivity'] . "\n------------------");
		// session_unset();
		header("Location: LogoutHandler.php");
	}
	
	$_SESSION['lastActivity'] = time();

	// Initialize START state as UNset
	if (!isset($_SESSION['loginState'])) {
		$_SESSION['loginState'] = $_SESSION['START'];
	}

?>

<html>

<head>
	<title>Invest And Learn
		<?php
			$log->LogDebug("Setting Title Tag, thisPage variable = " . $thisPage);
			if ($thisPage != "") { // Add current Page's name to title
				echo " | " . $thisPage;
			}
		?>
	</title>
	
	<link rel="stylesheet" href="Styles/font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/x-icon" href="Images/favicon.png">
	<link rel="stylesheet" type="text/css" href="Styles/myStyles.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="Scripts/InvestAndLearn.js"></script>
</head>


<header>
	<div id="banner" class="dark-purple-background simple-border">
		<a href="index.php"><i id="banner-logo" class="fa fa-graduation-cap fa-5x cyan-text"></i></a>
		<div id="banner-text" class="white-text">Invest And Learn!</div>
		<nav id="banner-nav" class="nav-fonts white-text">
			<a onclick="contactUs()" class="white-text" alt="Contact Us">Contact Us | </a>
			<a href="AboutUsPage.php" class="white-text" alt="About Us"
				<?php
					if ($thisPage == "About-Us-Page") { // Inject 'id' in anchor element
						echo " id=\"current-Page\"";
					}
				?>>
				About Us | 
			</a>
			<a href="JoinForm.php" class="secure white-text" alt="New Member Join"
				<?php
					if ($thisPage == "Join-Page") { // Inject 'id' in anchor element
						echo " id=\"current-page\"";
					}
				?>>
				Join Club | 
			</a>
			<?php
				if ($_SESSION['loginState'] == $_SESSION['SUCCESS']) {	  // Already logged in
					echo "<a href='LogoutHandler.php' class='cyan-text' alt='Logout'>Logout</a>";
				} else {
					echo "<a href='LoginForm.php' class='secure cyan-text' alt='Member Login'
						  	<?php
								if ($thisPage == 'Login-Page') {
									echo ' id=\"current-page\"';
								}
							?>
						  	<i class='fa fa-lock'></i> Member Login
						  </a>";
				}
			?>
		</nav>
	</div>

	<nav id="main-menu-nav" class="nav-fonts simple-border">
		<a href="index.php" class="dark-purple-text" alt="Home"
			<?php
				if ($thisPage == "Home-Page") {		// Inject 'id' in anchor element
					echo " id=\"current-page\"";
				}
			?>>
			Home | </a>

		<a href="LearnPage.php" class="dark-purple-text" alt="Learn To Invest"
			<?php
				if ($thisPage == "Learn-Page") {	// Inject 'id' in anchor element
					echo " id=\"current-page\"";
				}
			?>>
			Learn | </a>

		<a href="CalendarPage.php" class="dark-purple-text" alt="Calendar"
			<?php
				if ($thisPage == "Calendar-Page") {	// Inject 'id' in anchor element
					echo " id=\"current-page\"";
				}
			?>>
			Events Calendar | </a>

		<a href="BlogPage.php" class="dark-purple-text" alt="Blog"
			<?php
				if ($thisPage == "Blog-Page") {	// Inject 'id' in anchor element
					echo " id=\"current-page\"";
				}
			?>>
		Blog</a>

		 <!--The user's login state is assessed below and corresponding message rendered. -->
		<?php
			if ($_SESSION['loginState'] == $_SESSION['SUCCESS']) {
				echo "<div id='success-state' class='dark-purple-text login-state-msg'>Welcome " 
					. $_SESSION['userName'] 
					. "</div>";
			} else if ($_SESSION['loginState'] == $_SESSION['LOGGED_OUT']) {
				echo "<div id='logged-out-state' class='dark-purple-text login-state-msg'>Logged Out, Thanks For Visiting!</div>";
				$_SESSION['loginState'] = $_SESSION['START'];
			}
			//  else if ($_SESSION['loginState'] == $_SESSION['TIMED_OUT']) {
			// 	echo "<a href='LoginForm.php' id='timed-out-state' class='dark-purple-text login-state-msg'>*** Timed Out, Please Login Again</a>";
			// 	$_SESSION['loginState'] = $_SESSION['START'];
			// }
		?>
	</nav>

</header>

<body>
