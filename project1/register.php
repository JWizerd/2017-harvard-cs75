<?php session_start(); ?>
<?php  
  if (isset($_SESSION['authenticated'])) {
    header( 'Location: dashboard.php' );
    exit();
  }
?>
<?php require('helpers/config.php'); ?>
<?php require(PARTIAL . 'header.php'); ?>
<?php require(CONTROLLER . 'register.php'); ?>
<?php open_wrap(); ?>

<div class="col-sm-4 col-sm-offset-4">

    <h1>Create an Account</h1>
    <p style="color: green; text-transform: uppercase;">Sign up today and get a $10,000 reward!</p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="form-group">
        <input required type="text" name="first_name" class="form-control" placeholder="First Name">
      </div>
      <div class="form-group">
        <input required type="text" name="last_name" class="form-control" placeholder="Last Name">
      </div>
      <div class="form-group">
        <input required type="email" name="email" class="form-control" placeholder="Email Address">
      </div>
      <div class="form-group">
        <p>Please make sure your Password meets these requirements:</p>
        <ul>
          <li>Must be longer than 8 characters</li>
          <li>Must contain alphabetical characters</li>
          <li>Must NOT contain spaces</li>
        </ul>
        <input required type="text" name="password" class="form-control" placeholder="Password">
      </div>
      <input type="submit" class="btn btn-default" name="create_account">
    </form>
    <p>OR <a href="login.php">Login to your account</a></p>
    
</div>

<?php close_wrap(); ?>
<?php require(PARTIAL . 'footer.php'); ?>