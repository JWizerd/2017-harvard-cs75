<?

    $s = urlencode($_GET["symbol"]);
    $url = "http://download.finance.yahoo.com/d/quotes.csv?s={$s}&f=sl1d1t1c1ohgv&e=.csv";
    $handle = fopen($url, "r");
    $row = fgetcsv($handle);
    fclose($handle);

?>

<!DOCTYPE html>

<html>
  <head>
    <title>C$75 Finance</title>
  </head>
  <body>
    The current price of <?= htmlspecialchars($_GET["symbol"]) ?> is $<?= $row[1] ?>.
  </body>
</html>
