<?php
    session_start();

    $_SESSION['loginState'] = $_SESSION['LOGGED_OUT'];      // State must stay set until browser closes.
    if(isset($_SESSION['userName'])) unset($_SESSION['userName']);
    if(isset($_SESSION['userEmail'])) unset($_SESSION['userEmail']);
    if(isset($_SESSION['userPassword'])) unset($_SESSION['userPassword']);
    if(isset($_SESSION['userAccess'])) unset($_SESSION['userAccess']);
    header("Location:index.php");
?>