<?php
	/* 'header.php' is included in many other PHP sources, so start_session() is placed here to minimize redundance.
	$_SESSION associative array maintains elements as variables that persist between server and client exchange,
	but only as long as $SESSION_ID is the same (ie, session is still alive). */

	// session_start();	// Initiate and/or confirm $SESSION_ID cookie matches between server and client.
	session_start();

	require_once 'Classes/KLogger.php';
	$log = new KLogger("tmp/log.txt", KLogger::DEBUG);

	// Inititalize $_SESSION constants.
	include("constants.php");

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

	include("HeaderMarkup.php");
?>

	<!--Remaining markup for header to include state logic -->
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