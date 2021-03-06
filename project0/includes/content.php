<?php $category = single($page, $categories); ?>

<?php if ($page == $category['name']) : ?>
  
  <h1><?= $category['name']; ?></h1>

  <ul>
  <?php 
  foreach ($category as $item): ?>
  
    <li class="item">
      <form action="" method="post">
          <h3>&bigstar; <?= safe_str($item->name); ?> - </h3>
          <input type="hidden" name="item" value="<?= safe_str($item->name); ?>">
          <label for="small"><input type="checkbox" name="small" value="<?= safe_str($item->price->sm); ?>">SM: $<?= safe_str($item->price->sm); ?></label>
          <label for="large"><input type="checkbox" name="large" value="<?= safe_str($item->price->lg); ?>"> LG: $<?= safe_str($item->price->lg); ?></label>
          <?php if (isset($item->addon)): ?>

          <input type="checkbox" name="extra-cheese" value="<?= safe_str($item->addon->price); ?>">Addons: <?= safe_str($item->addon->name) ?> - $<?= safe_str($item->addon->price); ?>

          <?php endif ?>
          <input type="submit" value="Order" name="order">
      </form>
    </li>
  
  <?php endforeach ?>
  </ul>

<?php elseif($page != $category['name']): ?>
  <h1>Oh I'm terribly sorry but you have seemed to try to change my URL endpoints. Please visit another page please... fucker.</h1>
<?php endif; ?>