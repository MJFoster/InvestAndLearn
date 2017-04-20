<!-- All constants for site are below. -->
<?php
    $_SESSION['START'] = 0;
	$_SESSION['SUCCESS'] = 1;
	$_SESSION['PASSWORD_FAILED'] = -1;
	$_SESSION['EMAIL_FAILED'] = -2;	
	$_SESSION['ADD_FAILED'] = -3;
	$_SESSION['LOGGED_OUT'] = -4;
	$_SESSION['TIMED_OUT'] = -5;
	$_SESSION['ADD_RECORD_FAILED'] = "Could not add entry to database.";
	$_SESSION['ADD_RECORD_SUCCEEDED'] = "Entry Added!";
	$_SESSION['EMAIL_FAILED_MSG'] = "Email Not Found, Try again.";
	$_SESSION['PASSWORD_FAILED_MSG'] = "Password Not Found, Try again.";
	$_SESSION['PASSWORD_PATTERN'] = "(([0-9]|[A-Z]|[a-z]){5,10}){1}";
	$_SESSION['TIMEOUT'] = 1800;	// Timeout in 30 minutes.
?>