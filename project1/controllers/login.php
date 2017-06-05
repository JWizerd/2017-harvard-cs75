<?php 
  require(MODEL . 'user.php');

  class Session extends DB {

    function __construct() {

      if (isset($_POST['login'])) {
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $this->login($email, $password);
      }

    }

    private function authenticate($email, $password) {
      $user = $this->find_user($email);

      $creds_correct = (!empty($user) && password_verify($password, $user['password'])) ? true : false;
      return $creds_correct;
    }

    private function find_user($email) {
      $db = new DB();
      $stmt = $db->pdo->prepare("SELECT email, password FROM users WHERE email = ?");
      $stmt->execute([$email]);
      $user = $stmt->fetch();

      // close connection
      $db = null;
      $stmt = null;

      return $user;
    }

    private function set_session_token() {
      $_SESSION['authenticated'] = true;
    }

    private function login($email, $password) {
      $authenticated = $this->authenticate($email, $password);

      if ($authenticated) {
        $this->set_session_token();
        return true;
      } else {
        echo '<h2 style="color: red;">Username of Password is incorrect. Please try again.</h2>';
      }
    }
    
  }

  $login = new Session();
?>