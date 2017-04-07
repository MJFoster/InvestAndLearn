<?php
    session_start();
    $_SESSION['loginState'] = $_SESSION['LOGGED_OUT'];
    header("Location:index.php");
?>