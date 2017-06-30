<h2>Result: <?php if (isset($_GET['stock'])) { echo $_GET['stock']; } ?></h2>
<table class="table striped">
<thead style="font-weight: bold">
  <tr>
    <td>Stock</td>
    <td>Cost Per Share</td>
    <td>Timestamp</td>
    <td>Growth Rate</td>
    <td>More Numbers</td>
  </tr>
</thead>
  <tr>
    <?php $stock_info = new Controller_CSV(); ?>
    <?php $stock_info->display_formatted_data(); ?>
  </tr>
</table>

<?php if ($stock_info->invalid_entry($stock_info->csv_object) === false) : ?>

  <form action="" method="POST">
    <label for="quantity">Purchase Stock? Sure! How many would you like?</label>
    <input type="number" name="quantity" min="1">
    <input type="submit" value="Purchase" name="add_stock" class="buy-stock">
  </form>
  
<?php endif ?>