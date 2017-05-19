<?php
    session_start();
    session_destroy();
    session_start();

    include_once("analyticstracking.php");

    include("Constants.php");
    $_SESSION['loginState'] = $_SESSION['LOGGED_OUT'];
    
    header("Location:index.php");
?>