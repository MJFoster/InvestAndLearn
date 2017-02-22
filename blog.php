<?php
    include("header.php");
    $thisPage = "Blog-Page";
?>

<div class="main-content dark-purple-text">
    <div id="blog-container">
        <div>Invest And Learn Blog</div>
        <ul>
            <li>
                <?php
                    $blogPostDate = "02-22-17";     // TODO:  Add from db
                    echo "<h3>Posted: $blogPostDate</h3>";

                    // TODO:  Add from db                    
                    $blogPostText = "Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here ";
                    echo "<p class=\"testimonials-text\" id=\"blog-text\">$blogPostText</p>";   
                    
                    $blogPostAuthor = "Mickey Mouse";       // TODO:  Add from db
                    echo "<p id=\"blog-author\">- $blogPostAuthor</p>";
                ?>
            </li>
        </ul>
    </div>
</div>

<?php
    include("footer.php");
?>