<?php
// Sanitizes and validates user login data.
session_start();

require_once 'Classes/Dao.php';
require_once 'Classes/KLogger.php';

$dao = new Dao();
$log = new KLogger("tmp/log.txt", KLogger::DEBUG);

$count = 0;

// Initialize states
if (isset($_SESSION['userAccess'])) { unset($_SESSION['userAccess']);}

// Sanitize input data
$_SESSION['userEmail'] = htmlentities($_POST['userEmail']);
$_SESSION['userPassword'] = htmlentities($_POST['userPassword']);



// Check for availability of the SHA256 encryption method on user's browser.
// If available, encrypt with it by using a salt string.
if (CRYPT_SHA256 == 1) {
    $saltStr = "$5$saltMJ$";
    $hashedPswd = crypt($_SESSION['userPassword'], $saltStr);
    // Save in db as ... $hashedPswd.
    // Below, when comparing passwords for successful login, compare what's saved in the db
    // which is a 'hash' of the original password, against the hash of the <input>
    // ... use this function .... password_verify($_SESSION['userPassword'], $hashedPswd);
};




$users = $dao->getUser($_SESSION['userEmail']);
$count = $users->rowCount();
if ( $count == 0 ) { // No user found at that email
    $log->LogDebug("LoginHandler: User email NOT found!\n\nSearching For: " . $_SESSION['userEmail'] . "\n");
    $_SESSION['loginState'] = $_SESSION['EMAIL_FAILED'];
} else {  // User email found
    foreach ($users as $user) { // Should only be one unique user as specified by the db schema
        $foundEmail = htmlentities($user['User_Email']);
        $foundUserName = htmlentities($user['User_Name']);
        $foundPassword = htmlentities($user['User_Password']);
        $foundUserAccess = htmlentities($user['User_Access']);
    };
    $log->LogDebug("LoginHandler: User EMAIL Matched!\n\nSearching For: " . $_SESSION['userEmail'] . "\n\nFound: " . $foundEmail . "\n");
    if ($foundPassword == $_SESSION['userPassword']) {       // User password found
        $_SESSION['userAccess'] = $foundUserAccess;      // save userAccess in session
        $_SESSION['userName'] = $foundUserName;          // save userName in session
        $_SESSION['loginState'] = $_SESSION['SUCCESS'];
        $log->LogDebug("LoginHandler: \$_SESSION Updated\n"
                            . "userName: " . $_SESSION['userName'] . "\n"
                            . "userAccess: " . $_SESSION['userAccess'] . "\n"
                            . "loginState: " . $_SESSION['loginState'] . "\n");
    } else {    // User password does not match
        $log->LogDebug("LoginHandler: User password NOT found!\n\nSearching For: " . $_SESSION['userPassword'] . "\n");
        $_SESSION['loginState'] = $_SESSION['PASSWORD_FAILED'];
    }
} 

$log->LogDebug("------------------");

header("Location:LoginForm.php");


