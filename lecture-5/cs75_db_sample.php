<? 
  $host = 'localhost';
  $db   = 'cs75_sample';
  $user = 'root';
  $pass = 'root';
  $charset = 'utf8';

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $opt = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  try {
    $pdo = new PDO($dsn, $user, $pass, $opt);
  }

  catch(Exception $e) {
    echo $e->getMessage();
  }

  if (isset($_POST['product_submit'])) {
    $name = $_POST['name'];
    $employee_id = $_POST['employee_id'];
    $stmt = $pdo->prepare("INSERT INTO products (name, employee_id) VALUES (?, ?)");
    $stmt->execute([$name, $employee_id]);
    $rows_added = $stmt->rowCount();
    echo $rows_added;
  }

  if (isset($_POST['employee_submit'])) {
    $name = $_POST['name'];
    $stmt = $pdo->prepare("INSERT INTO employees (name) VALUES (?)");
    $stmt->execute([$name]);
    $rows_added = $stmt->rowCount();
    echo $rows_added;
  }

// $link = new mysqli('localhost', 'root', 'root', 'php_oop_gallery');

?>

<h2>Employee</h2>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
  <label for="name">Name</label>
  <input type="text" name="name" placeholder="your name">
  <input type="submit" name="employee_submit">
</form>

<h2>Products</h2>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
  <label for="name">Product</label>
  <input type="text" name="name" placeholder="enter a product">
  <input type="hidden" name="employee_id" value="2">
  <input type="submit" name="product_submit">
</form>

<?php 
  $products = $pdo->query("SELECT products.name FROM products WHERE  employee_id = 2")->fetch();

  print_r($products);

  foreach ($products as $product) {
    echo $product;
  }


?>