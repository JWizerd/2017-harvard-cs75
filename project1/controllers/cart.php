<?php

class Cart {
  private $item = [];
  private $cart = [];


  function __construct() {
    $this->set_stock();
    if (isset($_POST['add_stock'])) {
      $this->add_items_to_cart();
    }
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

    $_SESSION['cart'][] = $this->cart;
  }

  public function display_items() {

    if (isset($_SESSION['cart'])) {
      for ($i=0; $i < count($_SESSION['cart']); $i++) {
        echo  '<tr>' .
                '<td>' . $_SESSION['cart'][$i]['stock_name'] . '</td>' .
                '<td>' . $_SESSION['cart'][$i]['stock_shares'] . '</td>' .
                '<td>' .
                  '<form action="" method="POST">' . 
                    '<input type="submit" name="remove item" value="delete">' .
                  '</form>' .
                '</td>' .
              '</tr>';
      }
    }

  }

  private function delete_items() {
    
  } 

}

$cart = new Cart();

?>