<!DOCTYPE html>
<? session_start();
   $_SESSION['first_name'] = "jeremiah";
   $_SESSION['last_name'] = "wodke";
?>
<html>
  <head>
    <title>Google</title>
  </head>
  <body>
    <h1>You wanted to search for: <b><? print($_GET['q']) ?></b></h1>
    <h2><?= $_SERVER['PHP_SELF']; ?></h2>
    <?= $_SESSION['first_name']; ?>
    <?= $_SESSION['last_name']; ?>
  </body>
</html>
