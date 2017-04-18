<?php
    include("Header.php");
    $thisPage = "Blog-Page";
?>

<div class="main-content dark-purple-text">
    <div class="content-container">
        <?php
            if($_SESSION['loginState'] == $_SESSION['SUCCESS']) {
                echo "<button id='add-blog-button' class='buttons'><span><a href='BlogForm.php'>Add New Blog Post</a></span></button>";
            }
        ?>
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
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here 
                    ...  Blog content from the database goes here ";
                    echo "<p class=\"testimonials-text scrollable\">$blogPostText</p>";   
                    
                    $blogPostAuthor = "Mickey Mouse";       // TODO:  Add from db
                    echo "<p id=\"blog-author\">- $blogPostAuthor</p>";
                ?>
            </li>
        </ul>
    </div>
</div>

<?php
    include("Footer.php");
?>