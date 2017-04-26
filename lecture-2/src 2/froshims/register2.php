<?
    /***********************************************************************
     * register2.php
     *
     * Computer Science 50
     * David J. Malan
     *
     * Implements a registration form for Frosh IMs.  Informs user of 
     * any errors.
     **********************************************************************/
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Frosh IMs</title>
  </head>
  <body>
    <? if (empty($_POST["name"]) || empty($_POST["gender"]) || empty($_POST["dorm"]): ?>
      You must provide your name, gender, and dorm!  Go <a href="froshims2.php">back</a>.
    <? else: ?>
      You are registered!  (Well, not really.)
    <? endif ?>
  </body>
</html>
