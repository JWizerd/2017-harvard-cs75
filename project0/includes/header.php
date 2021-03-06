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
      <li><a href="./">home</a></li>
      
      <?php foreach ($categories as $category): ?>
      
        <li><a href="category.php?food=<?= safe_str($category['name']); ?>"><?= safe_str($category['name']); ?></a></li>

      <?php endforeach ?>
      <?php if (isset($_SESSION['cart'])): ?>
        <li><a href="cart.php">cart <?= '[ ' . count($_SESSION['cart']) . ' ]'; ?></a></li>
      <?php else : ?>
        <li><a href="cart.php">cart [ 0 ]</a></li>
      <?php endif; ?>
    </ul>