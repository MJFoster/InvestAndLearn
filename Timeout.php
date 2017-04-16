<!-- Executed upoon timeout from no activity. -->
<?php
    session_start();
    include("constants.php");
    $_SESSION['loginState'] = $_SESSION['TIMED_OUT'];
    header("Location: index.php");
?>