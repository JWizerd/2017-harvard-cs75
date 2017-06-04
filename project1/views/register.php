<?php require('helpers/config.php'); ?>
<?php require(PARTIAL . 'header.php'); ?>
<?php open_wrap(); ?>

<div class="col-sm-4 col-sm-offset-4">

    <h1>Create an Account</h1>
    <p>Sign up today and get a $10,000 reward!</p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="form-group">
        <input type="text" name="first_name" class="form-control" placeholder="Search for a Stock">
      </div>
      <div class="form-group">
        <input type="text" name="last_name" class="form-control" placeholder="Search for a Stock">
      </div>
      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Search for a Stock">
      </div>
      <input type="submit" class="btn btn-default" name="create_account">
    </form>

</div>

<?php close_wrap(); ?>
<?php require(PARTIAL . 'footer.php'); ?>