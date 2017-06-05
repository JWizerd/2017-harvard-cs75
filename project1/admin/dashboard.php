<?php session_start(); ?>
<?php  
  if (!isset($_SESSION['authenticated'])) {
    header( 'Location: ../login.php' );
    exit();
  }
?>
<?php require('../helpers/config.php'); ?>
<?php require('../' . PARTIAL . 'header.php'); ?>
<?php open_wrap(); ?>
  <h1>Dashboard</h1>
<?php close_wrap(); ?>
<?php require('../' . PARTIAL . 'footer.php'); ?>