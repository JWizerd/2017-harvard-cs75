<?php 
  
  // get all categories from xml file
  $categories = simplexml_load_file("../model/db.xml") or die("Error: Object Creation failure");

  // store get request for filtering products
  if (isset($_GET['food'])) {
    $page = $_GET['food']; 
  }

  // filter categories by grabbing single category
  function single($page, $categories) {
    foreach ($categories as $category) {
      if ($page == $category['name']) {
        return $category;
      }
    }
  }

  // persist products to session for shopping cart
  function set_up_cart() {
    $product = [];
    @$product['item']         = $_POST['item'];
    @$product['small']        = $_POST['small'];
    @$product['large']        = $_POST['large'];
    @$product['extra-cheese'] = $_POST['extra-cheese'];
    return $product;
  }

  function session_cart() {
    // because changing pages every time would re render my controller and would set the inital value of the session cart back to zero I figured out that setting an unset array while appending values to it at the same time works using the method below.
    $_SESSION['cart'][] = set_up_cart();
  }

  // if order is made post items to cart
  if (isset($_POST['order'])) {
    session_cart();
  }

  function is_cart_set() {
    if (isset($_SESSION['cart'])) {
      return $_SESSION['cart'];
    } else {
      echo '<p style="color:red;">Your Cart is Empty.';
    }
  }

  function remove_item() {
    if (isset($_POST['remove-item'])) {
      echo 'working';
    }
  }

  remove_item();
?>