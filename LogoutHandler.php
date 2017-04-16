<?php
    session_start();
    session_unset();

    include("Constants.php");
    $_SESSION['loginState'] = $_SESSION['LOGGED_OUT'];
    
    $_SESSION['lastActivity'] = time();
    header("Location:index.php");
?>