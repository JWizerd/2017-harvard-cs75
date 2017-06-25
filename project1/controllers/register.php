<?php 
  require(MODEL . 'user.php');

  class Register extends User {

    public function __construct() {
      if (isset($_POST['create_account'])) {
        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name  = htmlspecialchars($_POST['last_name']);
        $email      = htmlspecialchars($_POST['email']);
        $password   = htmlspecialchars($_POST['password']);

        $this->validate_user($first_name, $last_name, $password, $email);
      }
    }

    private function validate_user($first_name, $last_name, $password, $email) {
      if ($this->user_exists($email)) {
        echo "<h1 style='color: red; text-align: center;'>" .
              "dude you are already registered. Just <a href='login.php'>Login</a>" . 
             "<h1>";
      } else {
        $this->form_validation($first_name, $last_name, $password, $email);
      }
    }

    private function new_user($first_name, $last_name, $password, $email) {
      $user = new User($first_name, $last_name, $password, $email);
    }

    private function user_exists($email) {
      $db = new DB();
      $stmt = $db->pdo->query('SELECT email FROM users');
      $user = $stmt->fetch();
      $user_exists = $user['email'] === $email ? true : false;
      return $user_exists;
    }

    private function form_validation($first_name, $last_name, $password, $email) {
      // make sure first name and last name has no special chars or numbers
      if (ctype_alpha($first_name) && ctype_alpha($last_name)) {
        // make sure that password is longer than 8 chars and has no whitespaces.
        if (strlen($password) >= 8 && !preg_match('/\s/', $password)) {

          echo  '<h1>Thank you for signing up! Please ' .
                  '<a href="login.php">login</a>' . 
                '</h1>';
          $this->new_user($first_name, $last_name, $email, $password);
          $this->add_reward($email);

        } else {

          echo  '<strong style="color: red; text-align: center;">' . 
                  'Please make sure your password meets the requirements' . 
                '</strong>';

        }
      } else {

          echo  '<strong style="color:red; text-align: center;">' . 
                  'One or more fields are incorrect please try again.' . 
                '</strong>';
          return false;

      }
    }

    private function add_reward($email) {
      $db = new DB();
      $user_id = $db->get_user_id($email);
      $stmt = $db->pdo->prepare("INSERT INTO budget (user_id, balance) VALUES (?, ?)");
      $stmt->execute([$user_id, 10000]);

      // close connection
      $db = null;
      $stmt = null;
    } 

  }

  $register = new Register();
?>