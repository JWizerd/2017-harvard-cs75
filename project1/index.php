<?php require('helpers/config.php'); ?>
<?php require(PARTIAL . 'header.php'); ?>
<?php require(CONTROLLER . 'csv.php'); ?>
  <?php open_wrap(); ?>

    <div class="col-sm-4">

      <h1>CS$75 Finance</h1>
      <p>Enter the stock that you're looking to buy</p>
      <p>OR</p>
      <p><a href="login.php">login</a> - OR - <a href="register.php">register</a></p>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <div class="form-group">
          <input type="text" name="stock" class="form-control" placeholder="Search for a Stock">
        </div>
        <input type="submit" class="btn btn-default" name="search-stock">
      </form>

    </div>

    <div class="col-sm-8">
      
      <?php if (isset($_GET['search-stock'])) : ?>
        <?php include(PARTIAL . 'stock_table.php'); ?>
      <?php else : ?>
        <h2>Project Description</h2>
        <p>This application is a school project evaulauted by Harvard CS75 Free Open Courseware and Attending Harvard Students Alike. This project's mission is to teach students about relational databases, web application security, csv, model view controller and more.</p>
      <?php endif; ?>

    </div>

  <?php close_wrap(); ?>
<?php require(PARTIAL . 'footer.php'); ?>