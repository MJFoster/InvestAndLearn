<?php
    include("Header.php");
    $thisPage = "Blog-Page";

    if ( !isset($_SESSION['blogAddState'] )) {
        $_SESSION['blogAddState'] = $_SESSION['START'];
    }

    $log = new KLogger("tmp/log.txt", KLogger::DEBUG);
?>

<div class="main-content dark-purple-text">
    <div class="messages">
        <?php
            
            if($_SESSION['loginState'] == $_SESSION['SUCCESS']) {
                echo "<button id='add-blog-button' class='buttons'><span><a href='BlogForm.php'>Add New Blog Post</a></span></button>";
            }

            echo "<div class='form-msg succeeded'>". $_SESSION['ADD_RECORD_SUCCEEDED'] . "</div>";
            echo "<div class='form-msg failed'>" . $_SESSION['ADD_RECORD_FAILED'] . "</div>";

            // Render blogAddState message
            switch ($_SESSION['blogAddState']) {

                case $_SESSION['SUCCESS']:
                    // set cookie reflecting add success
                    setcookie("ckBlogAddState", $_SESSION['SUCCESS']);
                    break;

                case $_SESSION['ADD_FAILED']:
                    // set cookie reflecting add failed
                    setcookie("ckBlogAddState", $_SESSION['ADD_FAILED']);
                    break;
            
                case $_SESSION['START']:
                    break;

                default:
                    break;
            }

            $log->LogDebug("BlogPage.php: blogAddState = " . $_SESSION['blogAddState'] . "\n------------------");
        ?>
    </div>

    <div class="content-container">
        <div>Invest And Learn Blog</div>

        <ul>
            <li>    <!-- TODO: Render new <li> for each entry retrieved from blog-->
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