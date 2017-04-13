<?php
    session_start();
    session_unset();

    include("constants.php");
    $_SESSION['loginState'] = $_SESSION['LOGGED_OUT'];
    
    $_SESSION['lastActivity'] = time();
    header("Location:index.php");
?>