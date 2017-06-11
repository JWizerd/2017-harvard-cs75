<h2>Result:</h2>
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

  <form action="<?php $_SERVER['PHP_SELF'] ?>">
    <label for="quantity">Purchase Stock? Sure! How many would you like?</label>
    <input type="number" name="quantity" min="1">
    <input type="submit" value="Purchase" name="Add Stock">
  </form>
  
<?php endif ?>