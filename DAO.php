<?php

/*require_once 'KLogger.php';*/
#mysql://b30b5dd36123b5:81564b86@us-cdbr-iron-east-05.cleardb.net/heroku_56685c622a54a69?reconnect=true
class DAO {

  private $host = 'us-cdbr-iron-east-05.cleardb.net';
  private $dbname = 'heroku_56685c622a54a69';
  private $username = 'b30b5dd36123b5';
  private $password = '81564b86';
  /*private $logger;

  public function __construct() {
    $this->logger = new KLogger ( "log.txt" , KLogger::DEBUG );
  }*/

  public function getConnection() {
    try {
       $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
    } catch (Exception $e) {
      echo print_r($e,1);
    }
    return $connection;
  }

  public function getShopFront() {
    $conn = $this->getConnection();
    try {
    return $conn->query("SELECT * FROM item WHERE item_shopfront=1", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }

  public function getUser($user_email) {
    try {
      $conn = $this->getConnection();
      $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = :email");
      $stmt->bindParam(':email', $user_email);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      return $user;

    } catch (Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }

  public function createUser($email, $pass) {
    try {
      $conn = $this->getConnection();
      $stmt = $conn->prepare("INSERT INTO users (`user_email`, `user_password`, `user_DOB`, `user_orders`) VALUES (?, ?,'', NULL)");
      $stmt->execute(array($email, $pass));
      return $stmt;
    } catch (Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }
  public function getItem($id) {
    
  }
  /*
  public function saveComment ($comment) {
    $this->logger->LogInfo("saving a comment [{$comment}]");
    $conn = $this->getConnection();
    $saveQuery = "insert into comment (comment) values (:comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

  public function deleteComment ($id) {
    $conn = $this->getConnection();
    $deleteQuery = "delete from comment where comment_id = :id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }*/
}