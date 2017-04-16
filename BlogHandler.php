<?php
// Adds and deletes entries to underlying blogpost table.

session_start();

require_once 'Classes/Dao.php';
require_once 'Classes/KLogger.php';

$dao = new Dao();
$log = new KLogger("tmp/log.txt", KLogger::DEBUG);

// Sanitize input data from BlogPostForm
$_SESSION['postText'] = htmlentities($_POST['postText']);
$_SESSION['postLikes'] = htmlentitites($_POST['postLikes']);
$_SESSION['postNotLikes'] = htmlentities($_POST['postNotLikes']);

if($dao->addBlogPost($_SESSION['userEmail'], $_SESSION['userName'], $_SESSION['postText'], $_SESSION['postLikes'], $_SESSION['postNotLikes'])) {
    $log->LogDebug("BlogHandler: New blogpost successfully added.");
} else {
    $log->LogDebug("addUser: New user add failed.");
}
$log->LogDebug("------------------");

header("Location:BlogForm.php");
exit;





