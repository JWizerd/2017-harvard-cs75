<?php
  // in order to get access to the session object you have to add session start to every page
  session_start();

  if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) {
    echo '<h1>Logged In</h1>' .
         '<a href="logout.php">Logout</a>';
  } else {
    echo 'You are not logged in please login </br>' .
         '<a href="login.php">Login</a>';
  }
?>
