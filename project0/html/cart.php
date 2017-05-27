<?php 
require('../includes/header.php'); 
$cart = is_cart_set();
?>

<ul class="items-in-cart">

  <?php foreach ($cart as $item => $product): ?>

      <form action="" method="post">
          <span>&bigstar; <?= safe_str($product['item']); ?> - </span>
          <input type="hidden" name="item" value="<?= safe_str($product['item']); ?>">
          
          <span><?= safe_str($product['small']); ?></span>

          <span><?= safe_str($product['large']); ?></span>

          <span><?= safe_str($product['extra-cheese']); ?></span>

          <input class="remove-item" type="submit" value="Remove Item" name="remove-item">
      </form>

  <?php endforeach ?>

</ul>

<p>Total: <?php $total; ?></p>

<?php require('../includes/footer.php'); ?>