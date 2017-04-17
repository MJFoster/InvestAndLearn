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

                <input id="join-form-submit" type="submit">
            </div>
        </form>

        <?php
        switch ($_SESSION['loginState']) {

            case $_SESSION['SUCCESS']:
                echo "<div class='form-msg'>"
                . $_SESSION['ADD_RECORD_SUCCEEDED']
                . "</div>";
                break;
                
            case $_SESSION['ADD_FAILED']:
                echo "<div>BlogForm: ..."
                . $_SESSION['ADD_RECORD_FAILED']
                . "</div>";
                break;

            case $_SESSION['EMAIL_FAILED']:
                break;

            case $_SESSION['PASSWORD_FAILED']:
                break;

            case $_SESSION['START']:
                break;

            case $_SESSION['LOGGED_OUT']:
                break;

             case $_SESSION['TIMED_OUT']:
                break; // no message.
           
            default:
                echo "<div class='alert-message'>Invalid loginState</div>";
        }
        ?>
    </div>

</body>