<?php
    include("Header.php");
?>
    <div>
        <form class="add-form" id="blog-form" method="POST" action="BlogHandler.php">
            <div class="form-inputs">

                <label for="postText" class="required">* Post Text: </label>
                <input id="post-text" type="text"
                    placeholder="Enter your post ..."
                    <?php
                        if (isset($_SESSION['postText'])) {
                            echo 'value="' . $_SESSION['postText'] . '"';
                        }
                    ?>
                    name="postText" required>

                <input id="add-form-submit" type="submit">
            </div>
        </form>
    </div>

</body>