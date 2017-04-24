<?php
    $thisPage = "Blog-Page";
    include("Header.php");
    $mainNav = true;

    require_once 'Classes/Dao.php';
    require_once 'Classes/KLogger.php';

    $dao = new Dao();
    $log = new KLogger("tmp/log.txt", KLogger::DEBUG);
?>

<div class="main-content dark-purple-text simple-border">
    <div class="messages">
        <?php
            
            if ($_SESSION['loginState'] == $_SESSION['SUCCESS']) {
                echo "<button id='add-blog-button' class='buttons'>
                      <span><a href='BlogForm.php'>Add New Blog Post</a></span>
                      </button>";
            }

            // IFF blogAddState is set, render a message and reset state.
            if (isset($_SESSION['blogAddState'])) {
                // State is set, so an attempt to add has occurred. Rendering either success or failure message.
                if ($_SESSION['blogAddState'] === $_SESSION['SUCCESS']) {
                    echo "<div class='form-msg succeeded'>". $_SESSION['ADD_RECORD_SUCCEEDED'] . "</div>";
                } else {
                    echo "<div class='form-msg failed'>" . $_SESSION['ADD_RECORD_FAILED'] . "</div>";
                };

                // UNset blogAddState from here.
                unset($_SESSION['blogAddState']);
            }  // Initial / reset state renders NO MESSAGE.
        ?>
    </div>

    <div class="content-container">
        <div>Invest And Learn Blog</div>

        <ul>

            <?php  // Collect all existing blog posts and santize them.
                $blogPosts = $dao->getBlogPosts();
                if ($blogPosts->rowCount() <= 0) {
                    echo "<p class='testimonials-text'>No Entries Found ...</p>";
                }
                foreach ( $blogPosts as $blogPost) {
                    $postDate = htmlentities($blogPost['Post_Date']);
                    $postText = htmlentities($blogPost['Post_Text']);
                    $blogPostAuthor = htmlentities($blogPost['Post_Name']);
                    echo "<li><h3>Posted: " . $postDate . "</h3>"
                        . "<p class=\'testimonials-text scrollable\'>$postText</p>"
                        . "<p id=\"blog-author\">- $blogPostAuthor</p></li>";
                }
            ?>



            <!--<li>    <!-- TODO: Render new <li> for each entry retrieved from blog-->
                <!--<?php
                    // $blogPostDate = "02-22-17";     // TODO:  Add from db
                    // echo "<h3>Posted: $blogPostDate</h3>";-->

                    // TODO:  Add from db                    
                //     $blogPostText = "Blog content from the database goes here 
                //     ...  Blog content from the database goes here
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here 
                //     ...  Blog content from the database goes here ";
                //     echo "<p class=\"testimonials-text scrollable\">$blogPostText</p>";   
                    
                //     $blogPostAuthor = "Mickey Mouse";       // TODO:  Add from db
                //     echo "<p id=\"blog-author\">- $blogPostAuthor</p>";
                // ?>
            </li>-->
        </ul>
    </div>  <!-- END .content-container -->
</div>  <!-- END .main-content -->

<?php
    include("Footer.php");
?>