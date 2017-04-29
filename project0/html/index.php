<?php require('../includes/header.php'); ?>

<?php if (isset($_GET['page'])): ?>
  <?php 
  $page = $_GET['page'];
  require('../includes/content.php'); 
  ?>
<?php else: ?>
  <h1>Welcome to the home page for the pizza shack.</h1>
  <a href="?name=test" name="hello">test link</a>
<?php endif; ?>

<?php require('../includes/footer.php'); ?>