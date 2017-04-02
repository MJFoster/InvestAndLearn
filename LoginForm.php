<?php
session_start();

$EMAIL_FAILED_MSG = "Email Not Found, Try again.";  // TODO:  Implement new user option here.
$PASSWORD_FAILED_MSG = "Password Not Found, Try again.";
$ALERT_BOX = "<div class='alert-message'>
            <span class='close-btn' onclick='this.parentElement.style.display='none';'>&times;</span>";
?>

<div>
    <form method="POST" action="LoginHandler.php">
        <div class="form-inputs">

            <label for="userEmail" class="required">* User Email:  </label>
            <input id="user-email" type="email"
                placeholder="Enter Email "
                <?php
                    if (isset($_POST['userEmail'])) {
                        echo 'value="' . $_POST["userEmail"] . '"';
                    }
                ?>
                name="userEmail" required>

            <label for="user-password" class="required">* Password :  </label>
            <input id="user-password" type="text" pattern="(([0-9]|[A-Z]|[a-z]){5,10}){1}" 
                placeholder="5-10 alpha-numeric chars)" 
                name="userPassword" required>

            <input type="submit">
        </div>
    </form>

    <?php
    switch ($_SESSION['loginState']) {

        case $_SESSION['SUCCESS']:
            header("Location:index.php");   // TODO:  Remove if not needed.
            break;

        case $_SESSION['EMAIL_FAILED']:
            echo "<div class='alert-message'>";
            echo $EMAIL_FAILED_MSG;
            echo "</div>";
            break;

        case $_SESSION['PASSWORD_FAILED']:
            // echo "<script type='text/javascript'>alert('" . $PASSWORD_FAILED_MSG . "');</script>";
            echo "<div class='alert-message'>";
            echo $PASSWORD_FAILED_MSG;
            echo "</div>";
            break;

        case 0:
            break;   // Initial state, no message.

        default:
            echo $ALERT_BOX. "Invalid loginState</div>";
    }
    ?>
</div>