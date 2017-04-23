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
      try {
        $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
      } catch (Exception $e) {
        $this->log->LogFatal($e);
        exit;
      }
      return $conn;
    }


    /*
    * Searches 'user' table for given email.
    * If found, return query result in an associative array, else false.
    */
    public function getUser ($email) {
      $conn = $this->getConnection();
      $queryString = "select User_Name, User_Email, User_Password, User_Access from user where User_Email='" . $email . "';";
      return $conn->query($queryString);     // PDO Statement object returned if found, else 'false'.
    }

    
    /* Adds new user to 'user' table.
    * Return true if added, otherwise false.
    */
    public function addUser($userName, $userPassword, $userEmail, $userAccess = GENERAL_ACCESS) { // GENERAL_ACCESS is default and optional
      $conn = $this->getConnection();
      $addQuery = "insert into user (User_Email, User_Name, User_Password, User_Access) 
                            values (:userEmail, :userName, :userPassword, :userAccess);";
      $q = $conn->prepare($addQuery);
      $q->bindParam(":userEmail", $userEmail);
      $q->bindParam(":userName", $userName);
      $q->bindParam(":userPassword", $userPassword);
      $q->bindParam(":userAccess", $userAccess);
      if ( $q->execute() ) {
        return true;
      } else {
        $this->log->LogDebug("addUser: User email already taken, email must be distinct.");
        return false;
      }
    }


    /* Searches 'blogpost' table for all blogPost records.
    *  Returns all records in an associative array, or false if none found.
    */
    public function getBlogPosts() {
        $this->log->LogDebug("getBlogPosts: Searching for blogpost records ...");
        $conn = $this->getConnection();
        $queryString = "select * from blogpost order by Post_Date desc;";
        return $conn->query($queryString);  // PDO statement object returned if found, else 'false'.
    }


    /* Adds a record to 'blogpost' table.
    * Return true if added, otherwise false.    
    */
    public function addBlogPost($postEmail, $postName, $postText, $postLikes, $postNotLikes) {
      $conn = $this->getConnection();
      $addQuery = "insert into blogpost (Post_Email, Post_Name, Post_Date, Post_Text)
                             values (:postEmail, :postName, current_date(), :postText);";
      $q = $conn->prepare($addQuery);
      $q->bindParam(":postEmail", $postEmail);
      $q->bindParam(":postName", $postName);
      $q->bindParam(":postText", $postText);
      if ( $q->execute() ) {          // Execute MySQL call, returns true on success, else false.
        $this->log->LogDebug("addBlogPost: Blogpost Added.");
        return true;
      } else {
        $this->log->LogDebug("addBlogPost: Blogpost NOT added.");
        return false;
      }
    }

  }

