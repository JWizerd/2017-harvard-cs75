<?php session_start(); ?>
<?php  
  if (!isset($_SESSION['authenticated'])) {
    header( 'Location: login.php' );
    die();
  }
?>
<?php require('helpers/config.php'); ?>
<?php require(PARTIAL . 'header.php'); ?>
<?php require(CONTROLLER . 'login.php'); ?>
<?php open_wrap(); ?>
  <div class="col-sm-12">
    <a href="index.php" class="left20 pull-right">Find Stocks</a>
    <div class="form-inline pull-right">
      <form action="logout.php">
        <input type="submit" name="logout_user" value="logout" method="POST">
      </form>
    </div>
  </div>
  <h1>Dashboard</h1>
  <div class="card">
    <div class="card-block text-nowrap">
      <h2>Your Stock Portolfio</h2>
    </div>
  </div>
<?php close_wrap(); ?>
<?php require(PARTIAL . 'footer.php'); ?>