<?php
// Adds and deletes entries to underlying blogpost table.

session_start();

include_once("analyticstracking.php");

require_once 'Classes/Dao.php';
require_once 'Classes/KLogger.php';

$dao = new Dao();
$log = new KLogger("tmp/log.txt", KLogger::DEBUG);

// Sanitize input data from BlogPostForm
$_SESSION['postText'] = htmlentities($_POST['postText']);

if($dao->addBlogPost($_SESSION['userEmail'], $_SESSION['userName'], $_SESSION['postText'], $_SESSION['postLikes'], $_SESSION['postNotLikes'])) {
    $_SESSION['blogAddState'] = $_SESSION['SUCCESS'];   // set blogAddState to success
    $_SESSION['postText'] = ""; // unset input field
} else {
    $log->LogDebug("addUser: New user add failed." . "------------------");    // blogAddState remains UN-SET
    $_SESSION['blogAddState'] = $_SESSION['ADD_FAILED'];
}

header("Location:BlogPage.php");
exit;





