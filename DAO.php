<?php
class DAO {

  private $host = 'us-cdbr-iron-east-05.cleardb.net';
  private $dbname = 'heroku_56685c622a54a69';
  private $username = 'b30b5dd36123b5';
  private $password = '81564b86';

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
    return $conn->query("SELECT * FROM items WHERE item_shopfront=1", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }

  public function getUser($email) {
    $user_email = $this->sanitize($email);

    try {
      $conn = $this->getConnection();
      $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = :email");
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      return $user;

    } catch (Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }

  public function createUser($email, $pass) {
    $email = $this->sanitize($email);
    $pass = $this->sanitize($pass); 

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
  $id = $this->sanitize($id);

  try {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("SELECT * FROM items WHERE item_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    return $item;

    } catch (Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }

function sanitize($data) {
  $data = trim($data);
  $data = htmlspecialchars($data);
  return $data;
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