<?php

/*require_once 'KLogger.php';*/

class DAO {

  private $host = 'localhost';
  private $dbname = 'taber_and_lark';
  private $username = 'ksaunders';
  private $password = 'TZ6XxVTeG2NH80mP';
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
    return $conn->query("select item_id, item_name, item_url, item_img from item", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
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