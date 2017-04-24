<?php
    $thisPage = "Blog-Page";
    include("Header.php");
?>
    <div>
        <form class="add-form" id="blog-form" method="POST" action="BlogHandler.php">
            <div class="form-inputs">

                <div for="postText" class="required">* Enter Blog Entry Below:</div>
                <textarea id="post-text" name="postText" required cols="75" rows="10"></textarea>
                <input id="add-form-submit" type="submit">
            </div>
        </form>
    </div>

</body>