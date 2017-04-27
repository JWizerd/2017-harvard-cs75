<?php
  session_start();

  define('USER', 'jeremiah');
  define('PASS', 'wodke');

  if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == USER && $_POST['password'] == PASS) {
      $_SESSION['authenticated'] = true;
      // redirect user to home page, using absolute path, per
      // http://us2.php.net/manual/en/function.header.php
      $host = $_SERVER["HTTP_HOST"];
      $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
      header('Location: http://'.$host.$path.'/home.php');
    } else {
      echo '<h2 style="color: red;">Wrong Username or Password</h2>';
    }
  } else {
    echo '<h2>Please login</h2>';
  }
?>

<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
  <input type="text" name="username">
  <input type="password" name="password">
  <input type="submit">
</form>
