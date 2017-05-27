<? 
    /**
     * home.php
     *
     * A simple home page for these login demos.
     *
     * David J. Malan
     * Computer Science S-75
     * Harvard Summer School
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
      <? if (isset($_SESSION["authenticated"])) { ?>
        You are logged in!  
        <br />
        <a href="logout.php">log out</a>
      <? } else { ?>
        You are not logged in!
      <? } ?>
    </h3>
    <br>
    <b>Login Demos</b>
    <ul>
      <li><a href="login5.php">version 5</a></li>
      <li><a href="login6.php">version 6</a></li>
      <li><a href="login7.php">version 7</a></li>
      <li><a href="login8.php">version 8</a></li>
    </ul>
  </body>
</html>
