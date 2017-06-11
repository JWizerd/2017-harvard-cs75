<?php session_start(); ?>
<?php require('helpers/config.php'); ?>
<?php require(CONTROLLER . 'login.php'); ?>
<?php  

    if (isset($_SESSION['authenticated'])) {
      $login->logout();
      header( 'Location: index.php' );
      die();
    } else {
      header( 'Location: dashboard.php' );
      die();
    }
?>