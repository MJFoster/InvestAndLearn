<!--
	 TODO:  
		* Scale main menu better ... place in <ul> or <div> ???
		* Move pages into "Pages" folder & re-direct references
		* Add modals for contactUs, memberLogin, adminLogin
		* Add to header.php, 
		   - "current-page" detection and added css
		   - "current-page"" variable to title tab ... iff != ""
		* Add "$$$" on top of logo (if time)
-->
<?php
    include("header.php");
    $thisPage = "Home-Page";
	$currentPage = $thisPage;
?>

<div id="main-content" class="black-text">
    In The Home Page!
</div>

<?php
    include("footer.php");
?>