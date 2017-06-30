<?php

class Cart {
  private $item = [];
  private $cart = [];


  function __construct() {
    $this->set_stock();
    if (isset($_POST['add_stock'])) {
      $this->add_items_to_cart();
    }
    $this->delete_stock();
  }

  private function set_stock() {
    if (isset($_GET['search-stock'])) {
      $_SESSION['stock'] = $_GET['stock'];
    }
  }

  private function add_items_to_cart() {
    $this->item['stock_shares'] = $_POST['quantity'];
    $this->item['stock_name']   = $_SESSION['stock'];
    $this->cart = $this->item;

    $_SESSION['cart'][$this->item['stock_name']] = $this->cart;
  }

  public function display_items() {

    if (isset($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $cart => $stock) {
        echo  '<form action="" method="POST">' . 
              '<tr>' .
                '<td><input readonly type="text" name="stock-name" value="' . $cart . '"/></td>' .
                '<td><input readonly type="text" name="stock-shares" value="' . $cart . '"/></td>' .
                '<td><input type="submit" name="remove-stock" value="delete"></td>' .
              '</tr>' . 
              '</form>';
              print_r($_SESSION['cart']);
      }
      // for ($i=0; $i < count($_SESSION['cart']); $i++) {
      //   echo  '<form action="" method="POST">' . 
      //         '<tr>' .
      //           '<td><input readonly type="text" name="stock-name" value="' . $_SESSION['cart'][]['stock_name'] . '"/></td>' .
      //           '<td><input readonly type="text" name="stock-shares" value="' . $_SESSION['cart'][$i]['stock_shares'] . '"/></td>' .
      //           '<td><input type="submit" name="remove-stock" value="delete"></td>' .
      //         '</tr>' . 
      //         '</form>';
      //         print_r($_SESSION['cart']);

      // }
    }

  }

  private function delete_stock() {
    if (isset($_POST['remove-stock'])) {
      foreach ($_SESSION['cart'] as $cart => $stock) {
        if ($cart == $_POST['stock-name']) {
          unset($_SESSION['cart'][$cart]);
          print_r($_SESSION['cart']);
        }
      }
    }
  } 

}

$cart = new Cart();

?>