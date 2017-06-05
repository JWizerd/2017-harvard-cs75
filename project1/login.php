<?php session_start(); ?>
<?php  
  if (isset($_SESSION['authenticated'])) {
    header( 'Location: ./admin/dashboard.php' );
    exit();
  }
?>
<?php require('helpers/config.php'); ?>
<?php require(PARTIAL . 'header.php'); ?>
<?php require(CONTROLLER . 'login.php'); ?>
<?php open_wrap(); ?>

<div class="col-sm-4 col-sm-offset-4">

    <h1>Login</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="form-group">
        <input required type="email" name="email" class="form-control" placeholder="Email Address">
      </div>
      <div class="form-group">
        <input required type="text" name="password" class="form-control" placeholder="Password">
      </div>
      <input type="submit" class="btn btn-default" name="login">
    </form>

</div>
<?php close_wrap(); ?>
<?php require(PARTIAL . 'footer.php'); ?>