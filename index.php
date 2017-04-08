<?php
	$thisPage = "Home-Page";
	$currentPage = $thisPage;
    include("header.php");

	// Initialize START states
	if (!isset($_SESSION['loginState']))
		$_SESSION['loginState'] = $_SESSION['START'];	
?>

<div class="main-content black-text">
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

</div>

<?php
    include("footer.php");
?>