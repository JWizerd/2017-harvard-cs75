<?php session_start(); ?>
<?php  
  if (!isset($_SESSION['authenticated'])) {
    header( 'Location: login.php' );
    die();
  }
?>
<?php require('helpers/config.php'); ?>
<?php require(PARTIAL . 'header.php'); ?>
<?php require(CONTROLLER . 'csv.php'); ?>
<?php require(CONTROLLER . 'cart.php'); ?>
  <?php open_wrap(); ?>

    <div class="col-sm-4">

      <h1>Cart</h1>
      
      <table class="table striped">
      <thead style="font-weight: bold">
        <tr>
          <td>Stock Name</td>
          <td>Stock Shares</td>
        </tr>
      </thead>
        <tr>
          <?php $cart->display_items(); ?>
        </tr>
      </table>

  <?php close_wrap(); ?>
<?php require(PARTIAL . 'footer.php'); ?>