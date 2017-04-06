<?php

  require_once 'Classes/KLogger.php';

  class Dao {

    // private $host = "localhost";
    // private $db = "InvestAndLearn";
    // private $user = "mjfoster";
    // private $pass = "password";

    private $host = "us-cdbr-iron-east-03.cleardb.net";
    private $db = "heroku_617ee5455801598";
    private $user = "b29b7b863c6a3d";
    private $pass = "27977cb5";

    private $log;
    private $ADMIN_ACCESS = 1;
    private $GENERAL_ACCESS = 0;

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
    * Searches 'user' table for given email.
    * If found, return query result in an associative array, else false.
    */
    public function getUser ($email) {
      $this->log->LogDebug("getUser: Searching for email in database..." . $email);
      $conn = $this->getConnection();
      $queryString = "select User_Name, User_Email, User_Password, User_Access from user where User_Email='" . $email . "';";
      return $conn->query($queryString);     // PDO Statement object returned if found, else 'false'.
    }

    
    // Adds new user to 'user' table.
    // Return true if added, otherwise false.
    //
    public function addUser($userName, $userPassword, $userEmail, $userAccess = GENERAL_ACCESS) { // GENERAL_ACCESS is default and optional
      $conn = $this->getConnection();
      $addQuery = "insert into user (User_Email, User_Name, User_Password, User_Access) values (:userEmail, :userName, :userPassword, :userAccess);";
      $q = $conn->prepare($addQuery);
      $q->bindParam(":userEmail", $userEmail);
      $q->bindParam(":userName", $userName);
      $q->bindParam(":userPassword", $userPassword);
      $q->bindParam(":userAccess", $userAccess);
      if ( $q->execute() ) {
        $this->log->LogDebug("addUser: User added.");
        return true;
      } else {
        $this->log->LogDebug("addUser: User email already used, please enter a different user email.");
        return false;
      }
    }
  }

