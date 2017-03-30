<?php
/*
* Data Access Object to connect to a given database with, and
* provide functions to read/save data from/to database.  All
* database access attempts are logged in a text file using 'KLogger' class.
*/

require_once 'KLogger.php';

class Dao {

  // private $host = "localhost:2222";
  private $host = "localhost";
  private $db = "InvestAndLearn";
  private $user = "mjfoster";
  private $pass = "password";
  private $log;
  private $ADMIN_ACCESS = 1;
  private $USER_ACCESS = 0;

  public function __construct () {
    $this->log = new KLogger ("tmp/log.txt" , KLogger::DEBUG);
  }

  public function getConnection () {
    $this->log->LogDebug("getConnection: Attempting database connection...");
    try {
      $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
    } catch (Exception $e) {
      $this->log->LogFatal($e);
      exit;
    }
    $this->log->LogDebug("getConnection: Success, database connected!");
    return $conn;
  } 

  /*
  * Searches 'user' table for given email/password combo.
  * If found, return 'access', else return -1.
  */
  public function getUser ($email, $pswd) {
    $retVal = -1;
    if($email == null || $pswd == null) {
      $this->log->LogInfo("getUser: null paramater passed in.");
      return $result;
    }
    $this->log->LogInfo("getUser: Searching for user in database...");
    $conn = $this->getConnection();
    $queryString = "SELECT Access, Email FROM user WHERE Email='" . $email . "' AND Password='" . $pswd . "';";
    $result = $conn->query($queryString); // PDO Statement object returned if found, else 'false'.
    if($result) {  
      $this->log->LogInfo("getUser: User FOUND with Email = " . $result['Email']);
      $retVal = $result['Access'];
    } else {
      $this->log->LogInfo("getUser: User NOT found.");
      $retVal = -1;
    }
    return $retVal;
  }

  /*
  * Validate existing user.
  */
  public function loginUser ($email, $pswd) {
    $validated = true;
    if(findUser($email)) { // TODO : confirm return value is an int for user_id
      // TODO: check password
    } else {
      $this->log->LogInfo("loginUser: Email not found in database.");
      $validated = false;
    }
    return $validated;
  }

  /*
  * Adds new user to 'user' table in database.
  */
  public function addUser($user, $password, $email) {
    $this->log->LogInfo("adduser : Checking for duplicate user.");
    if (findUser($user, $password)) {
      $this->log->LogInfo("addUser: User already exists, please add a different username.");
      exit; // TODO : Just exit or goto a page here ???
    } else {

    // insert into user (access, email, password, username) values (0, "getmovednow2@gmail.com", "testing", "MJ Foster");
    }
  }

}
