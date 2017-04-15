<?php
    session_start();
?>



<html>
<head>
	<title>Invest And Learn</title>
	<link rel="stylesheet" type="text/css" href="Styles/myStyles.css">
	<link rel="stylesheet" href="Styles/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="Images/favicon.png">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"
			integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			crossorigin="anonymous">
	</script>
	<script type="text/javascript" src="Scripts/InvestAndLearn.js"></script>
</head>

<body>




<div>
    <form id="join-form" method="POST" action="JoinHandler.php">
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
                name="userName">  <!-- TODO:  add back in 'required' attribute on <input> tag -->
            
            <!-- Email format is validated with 'type=email' attribute -->
            <label for="userEmail" class="required">* User Email:  </label>
            <input id="user-email" type="email"
                placeholder="Enter Email "
                <?php
                    if (isset($_SESSION['userEmail'])) {
                        echo 'value="' . $_SESSION["userEmail"] . '"';
                    }
                ?>
                name="userEmail">      <!-- TODO:  add back in 'required' attribute on <input> tag -->

            <!-- Validate Password: Alphanumeric, no special chars, 5-10 chars inclusive permitted. -->
            <label for="user-password" class="required">* Password :  </label>
            <input id="user-password" type="text" pattern="<?php echo $_SESSION['PASSWORD_PATTERN']; ?>"
                placeholder="5-10 alpha-numeric chars)" 
                <?php
                    if (isset($_SESSION['userPassword'])) {
                        echo 'value="' . $_SESSION["userPassword"] . '"';
                    }
                ?>

                name="userPassword">    <!-- TODO:  add back in 'required' attribute on <input> tag -->

            <input id="join-form-submit" type="submit">
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

        case $_SESSION['EMAIL_FAILED']:
            break;

        case $_SESSION['PASSWORD_FAILED']:
            break;

        case $_SESSION['START']:
            break;

        case $_SESSION['LOGGED_OUT']:
            break;
        
        default:
            echo "<div class='alert-message'>Invalid loginState</div>";
    }
    ?>
</div>

</body>