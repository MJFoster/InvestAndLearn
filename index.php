<?php
	$thisPage = "Home-Page";
	$mainNav = true;

	include_once("analyticstracking.php");
    include("Header.php");
?>

<div class="main-content black-text simple-border white-background">
    <img id="home-page-image" src="Images/blue-$$$.jpg" alt="Stacked Money"/>
	<div>
		<div id="home-page-content" class="dark-purple-text">
			<p>
				Interested in putting your money to work so you don't have to when you finally retire?
			</p>
			<p>
				Are you wondering where to turn for advise, and worried about being taken advantage
				of?
			</p>
			<p>
				Join us here, and learn to invest at your own pace with as little money as you'd like.
			</p>
			<p>
				We want to grow our money also, so we lower the risks by investing together and learning 
				along the way.  Learning is key, so come along and we'll show you how!
			</p>
			<p>
				We like to grow our money also, but learning how to do it smart is really our priority!
			</p>
		</div>
		<button id="testimonials-button" class="buttons"><a href="TestimonialsPage.php">Testimonials</a></button>
	</div>

</div>

<?php
    include("Footer.php");
?>