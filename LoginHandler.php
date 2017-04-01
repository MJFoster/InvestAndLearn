<?php
// Sanitizes and validates user login data.
session_start();

require_once 'Classes/Dao.php';
$dao = new Dao();

// Sanitize input data
$userEmail = htmlentities($_POST['userEmail']);
$userPassword = htmlentities($_POST['userPassword']);

// Validate input data
// TODO:  Use regex to confirm legitimate email address and password is long enough, 

if ( $dao->getUser($userEmail) ) {
    // TODO:  confirm password, if matches render 'welcome' and goto index.php then exit.
    // save UserAccess in session

} else {
    // TODO: display error and create log message like ... "User not registered, please register to continue."
    // RE-PROMPT and persist previous inputs
    // TODO : Invalid inputs s/b different background color.
}
?>