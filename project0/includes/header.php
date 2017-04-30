<?php 
  session_start(); // start session to store items in shopping cart
  require('../includes/helpers.php');
  require('../controller/controller.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pizza Shack</title>
  <link rel="stylesheet" href="../html/styles.css">
</head>
<body>
  <h1 class="company">Pizza Shack</h1>
    <ul class="navigation">
      <li><a href="index.php">home</a></li>
      
      <?php foreach ($categories as $category): ?>
      
        <li><a href="index.php?page=<?= safe_str($category['name']); ?>"><?= safe_str($category['name']); ?></a></li>

      <?php endforeach ?>
      <li><a href="cart.php">cart / checkout <?= '[ ' . count($_SESSION['cart']) . ' ]'; ?></a></li>
    </ul>