<?php
    $thisPage = "Learn-Page";
    include_once("analyticstracking.php");
    include("Header.php");
    $mainNav = true;
?>

<!--TODO:  Implement <figure> and <figcaption> tags on <img> elements in LearnPage.php-->
<div class="main-content dark-purple-text simple-border">
	<div id="learn-container">
        <div>Learn To Grow Your Money!</div>
        <ul id="learn-subjects">
            <li>
                <a href="https://www.scottrade.com/knowledge-center/investment-education/investment-products.html" target="_blank">
                    <img src="Images/Chalkboard_Ideas.jpg" class="simple-border"/>
                </a>
            </li>
            <li>
                <a href="https://www.scottrade.com/knowledge-center/investment-education/learn-the-basics.html" target="_blank">
                    <img src="Images/Growth.jpg" class="simple-border"/>
                </a>
            </li>
            <li>
                <a href="https://www.scottrade.com/knowledge-center/investment-education/retirement.html" target="_blank">
                    <img src="Images/Retirement_Planning.jpg" class="simple-border"/>
                </a>
            </li>
        </ul>
    </div>
</div>

<?php
    include("Footer.php");
?>