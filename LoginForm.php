<?php
session_start();
?>

<div>
    <form method="POST" action="LoginHandler.php">
        <div class="form-inputs">

            <label for="user-email" class="required">* User Email:  </label>
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

        case $_SESSION['EMAIL_FAILED']:
            echo "<div class='alert-message'>";
            echo $_SESSION['EMAIL_FAILED_MSG'];
            echo "</div>";
            break;

        case $_SESSION['PASSWORD_FAILED']:
            echo "<div class='alert-message'>";
            echo $_SESSION['PASSWORD_FAILED_MSG'];
            echo "</div>";
            break;

        case 0:
            break;   // Initial state, no message.

        default:
            echo "<div class='alert-message'>Invalid loginState</div>";
    }
    ?>
</div>