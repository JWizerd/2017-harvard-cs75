<?php 
  require(MODEL . 'db.php');

  class Budget {

    private $budget;

    public function get_budget($user_id) {
      $stmt = $db->pdo->prepare("SELECT balance FROM budget WHERE user_id = ?");
      $stmt->execute([$user_id]);
      $balance= $stmt->fetch();
      return $balance;
    }
    
  }
?>