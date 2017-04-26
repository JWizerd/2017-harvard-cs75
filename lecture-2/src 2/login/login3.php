<?
    /**
     * login3.php
     *
     * A simple login module that remembers username of most recently
     * authenticated user so that it can pre-populate the username
     * field next time.
     *
     * David J. Malan
     * malan@harvard.edu
     */

    // enable sessions
    session_start();

    // were this not a demo, these would be in some database
    define("USER", "jharvard");
    define("PASS", "crimson");

    // if username and password were submitted, check them
    if (isset($_POST["user"]) && isset($_POST["pass"]))
    {
        // if username and password are valid, log user in
        if ($_POST["user"] == USER && $_POST["pass"] == PASS)
        {
            // remember that user's logged in
            $_SESSION["authenticated"] = true;

            // save username in cookie for a week
            setcookie("user", $_POST["user"], time() + 7 * 24 * 60 * 60);

            // redirect user to home page, using absolute path, per
            // http://us2.php.net/manual/en/function.header.php
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: http://$host$path/home.php");
            exit;
        }
    }
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Log In</title>
  </head>
  <body>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
      <table>
        <tr>
          <td>Username:</td>
          <td>
            <? if (isset($_POST["user"])): ?>
              <input name="user" type="text" value="<?= htmlspecialchars($_POST["user"]) ?>">
            <? elseif (isset($_COOKIE["user"])): ?>
              <input name="user" type="text" value="<?= htmlspecialchars($_COOKIE["user"]) ?>">
            <? else: ?>
              <input name="user" type="text" value="">
            <? endif ?>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input name="pass" type="password"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="Log In"></td>
        </tr>
      </table>      
    </form>
  </body>
</html>
