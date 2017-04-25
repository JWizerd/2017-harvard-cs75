<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>

    <h1><?= htmlspecialchars($_GET['name']); ?></h1>

    <p>You are a stupid <?= htmlspecialchars($_GET['gender']); ?></p>
    <p>You live in <?= htmlspecialchars($_GET['state']); ?></p>

    <?= $_SESSION['first_name']; ?>
    <?= $_SESSION['last_name']; ?>
    <? session_destroy(); ?>
  </body>
</html>
