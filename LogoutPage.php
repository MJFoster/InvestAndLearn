<?php
	session_start();
	
	// Inititalize $_SESSION constants.
	include("constants.php");
	
	$_SESSION['loginState'] = $_SESSION['START'];
	
	include("HeaderMarkup.php");
?>

		<!--Remaining markup of page to include timeout message -->
        <div id='login-state-msg' class='dark-purple-text'>Idle session, you've been logged out.</div>

	</nav>
</header>

<body>

<?php
	include("MainContentMarkup.php");
    include("footer.php");
?>