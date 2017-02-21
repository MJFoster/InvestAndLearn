<!--
	 TODO:  
		* Add page content
		   - Home
		   - Testimonials page & link from home page
		   - AboutUs
		   - Calendar
		   - Blog
		   - Learn
		* Add modals for contactUs, memberLogin, adminLogin
		* Add to header.php, 
		   - "current-page" detection to header.php
		   - "current-page"" variable to title tab ... iff != ""
		* Scale main menu better ...  ???
-->
<?php
    $thisPage = "Home-Page";
	$currentPage = $thisPage;
    include("header.php");
?>

<div id="main-content" class="black-text">
    <img class="images" id="home-page-image" src="Images/blue-$$$.jpg" alt="Stacked Money">
	<!--<img class="images" id="home-page-image" src="Images/Coins.jpg" alt="Stacked Money">-->
	<div>
		<p id="home-page-content" class="white-text purple-background">
			TBD ... A paragraph will go here that's aim is to motivate
			visitors to learn more about saving, growing, and investing money purposefully.
			Content will include the purpose of the site, and how to get involved.
		</p>
		<button id="testimonials-button" class="gold-background dark-purple-text"><a href="#"><i class="fa fa-play"></i> Testimonials</a></button>
	</div>

</div>

<?php
    include("footer.php");
?>