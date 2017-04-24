<!-- Form used for login of users. -->
<?php
    $thisPage = "Login-Page";
    include("Header.php");
?>
    <div>
        <!-- TODO:  Create modal form with <legend>User Login Form</legend> element -->
        <form class="get-form user-form" id="login-form" method="POST" action="LoginHandler.php">
            <div class="form-inputs">

                <label for="user-email" class="required">* User Email:  </label>
                <input id="user-email" type="email"
                    placeholder="Enter Email "
                    <?php
                        if (isset($_SESSION['userEmail'])) {
                            echo 'value="' . $_SESSION['userEmail'] . '"';
                        }
                    ?>
                    name="userEmail" required>

                <!-- Validate Password: Alphanumeric, no special chars, 5-10 chars inclusive permitted. -->
                <label for="user-password" class="required">* Password :  </label>
                <input id="user-password" type="password" pattern="<?php echo $_SESSION['PASSWORD_PATTERN']; ?>"
                    name="userPassword" required>

                <input id="login-form-submit" type="submit">
                <div class="input-requirements">* Required fields, password are 5-10 alpha-numeric chars</div>
            </div>
        </form>

        <?php
        switch ($_SESSION['loginState']) {

            case $_SESSION['SUCCESS']:
                header("Location:index.php");
                break;

            case $_SESSION['EMAIL_FAILED']:
                echo "<div class='form-error-message'>"
                . $_SESSION['EMAIL_FAILED_MSG']
                . "</div>";
                $_SESSION['loginState'] = $_SESSION['START'];
                break;

            case $_SESSION['PASSWORD_FAILED']:
                echo "<div class='form-error-message'>"
                . $_SESSION['PASSWORD_FAILED_MSG']
                . "</div>";
                $_SESSION['loginState'] = $_SESSION['START'];
                break;

            case $_SESSION['START']:
                break;  // Initial state, no message.

            case $_SESSION['LOGGED_OUT']:
                break; // no message.
                
            case $_SESSION['TIMED_OUT']:
                break; // no message.

            default:
                echo "<div class='alert-message'>Invalid loginState</div>";
        }
        ?>
    </div>
</body>