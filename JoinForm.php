<?php
session_start();
?>

<div>
    <form method="POST" action="JoinHandler.php">
        <div class="form-inputs">
            <h2>Thanks For Joining Invest And Learn!</h2>

            <label for="userName" class="required">* User Name: </label>
            <input id="user-name" type="text"
                placeholder="Enter your name"
                <?php
                    if (isset($_SESSION['userName'])) {
                        echo 'value="' . $_SESSION['userName'] . '"';
                    }
                ?>
                name="userName" required>
            
            <!-- Email format is validated with 'type=email' attribute -->
            <label for="userEmail" class="required">* User Email:  </label>
            <input id="user-email" type="email"
                placeholder="Enter Email "
                <?php
                    if (isset($_SESSION['userEmail'])) {
                        echo 'value="' . $_SESSION["userEmail"] . '"';
                    }
                ?>
                name="userEmail" required>

            <!-- Validate Password: Alphanumeric, no special chars, 5-10 chars inclusive permitted. -->
            <label for="user-password" class="required">* Password :  </label>
            <input id="user-password" type="text" pattern="<?php echo $_SESSION['PASSWORD_PATTERN']; ?>"
                placeholder="5-10 alpha-numeric chars)" 
                <?php
                    if (isset($_SESSION['userPassword'])) {
                        echo 'value="' . $_SESSION["userPassword"] . '"';
                    }
                ?>

                name="userPassword" required>

            <input type="submit">
        </div>
    </form>

    <?php
    switch ($_SESSION['loginState']) {

        case $_SESSION['SUCCESS']:
            header("Location:index.php");
            break;

        case $_SESSION['ADD_FAILED']:
            echo "<div>Could not add new user ..."
            . $_SESSION['ADD_RECORD_FAILED']
            . "</div>";
            break;

        case $_SESSION['START']:
            break;   // Initial state, no message.

        case $_SESSION['LOGGED_OUT']:
            break; // no message.
        
        default:
            echo "<div class='alert-message'>Invalid loginState</div>";
    }
    ?>
</div>