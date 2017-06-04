<?php 
  require(MODEL . 'db.php');

  class User extends DB {

    private $first_name;
    private $last_name;
    private $email;
    private $password;

    function __construct($first_name, $last_name, $email, $password) {
      $this->first_name = $first_name;
      $this->last_name  = $last_name;
      $this->email      = $email;
      $this->password   = $password;

      $this->add_user();
    }

    private function add_user() {
      $db = new DB();
      $stmt = $db->pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
      $stmt->execute([$this->first_name, $this->last_name, $this->email, password_hash($this->password, PASSWORD_DEFAULT)]);
      $rows_added = $stmt->rowCount();
      echo $rows_added;
      // close connection
      $db = null;
      $stmt = null;
    } 
    
  }
?>