<?php
    session_start();
    session_unset();
    $_SESSION['loginState'] = -4;
    $_SESSION['lastActivity'] = time();
    header("Location:index.php");
?>