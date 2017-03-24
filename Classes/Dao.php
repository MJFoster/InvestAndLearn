<?php
/*
* Data Access Object to connect to a given database with, and
* provide functions to read/save data from/to database.  All
* database access attempts are logged in a text file.
*/

require_once 'KLogger.php';

class Dao {

  private $host = "localhost:2222";
  private $db = "InvestAndLearn";
  private $user = "mjfoster";
  private $pass = "password";
  private $log;

  public function __construct () {
    $this->log = new KLogger ("tmp/log.txt" , KLogger::WARN);
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
  * Searches 'user' table for given user.
  * If found, return user_id, else return 0.
  */
  public int function findUser ($email) {
    $result = 0;  // TODO:  Initialization needed???
    $this->log->LogInfo("findUser: Searching for user in database...");
    $conn = $this->getConnection();
    $queryString = "select user_id from User where Email=" . $email;
    $result = $conn->query($queryString); // TODO:  Confirm return valaue here
    if($result > 0) {
      $this->log->LogInfo("findUser: User FOUND!");
      return $result;
    } else {
      $this->log->LogInfo("findUser: User NOT found.");
      return 0;
    }
  }

  /*
  * Validate and login existing user.
  */
  public boolean loginUser($email, $password) {
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

    }
  }

  
  // public function getComments () {    
  //   $this->log->LogInfo("Reading from database...");
  //   $conn = $this->getConnection();
  //   return $conn->query("select comment_text, date_entered from comments order by date_entered desc");
  // }

  // public function saveComment ($comment) {
  //   $this->log->LogInfo("Saving comment: " . $comment);

  //   $conn = $this->getConnection();
  //   $saveQuery = "insert into comments (comment_text, user_id) values (:comment_text, 1)";
  //   $q = $conn->prepare($saveQuery);
  //   $q->bindParam(":comment_text", $comment);
  //   $q->execute();
  // }
}
