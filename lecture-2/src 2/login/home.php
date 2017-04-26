<? 
    /**
     * home.php
     *
     * A simple home page for these login demos.
     *
     * David J. Malan
     * malan@harvard.edu
     */

    // enable sessions
    session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Home</title>
  </head>
  <body>
    <h1>Home</h1>
    <h3>
      <? if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) { ?>
        You are logged in!  
        <br>
        <a href="logout.php">log out</a>
      <? } else { ?>
        You are not logged in!
      <? } ?>
    </h3>
    <br>
    <b>Login Demos</b>
    <ul>
      <li><a href="login1.php">version 1</a></li>
      <li><a href="login2.php">version 2</a></li>
      <li><a href="login3.php">version 3</a></li>
      <li><a href="login4.php">version 4</a></li>
    </ul>
  </body>
</html>
