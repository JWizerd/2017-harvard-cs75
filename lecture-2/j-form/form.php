<?
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'j-form');

class Database {

  public $connection;

  public function open_db_connection() {
    $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($this->connection->connect_error) {
      die('error establishing database' . $this->connection->connect_error);
    }

  }

  public function query($sql) {
    $result = $this->connection->query($sql);
    $this->query_validation($result);
    return $result;
  }

  private function query_validation($result) {
    if(!$result) {
      die('error establishing databse' . $this->connection->error);
    }
  }

}

class Form extends Database {

  public function post_form() {
    $this->open_db_connection();
    $this->process_query();
  }

  public function process_query() {
    if (isset($_POST['submit'])) {
      $first_name = htmlspecialchars($_POST['first']);
      $last_name = htmlspecialchars($_POST['last']);
      $course_name = htmlspecialchars($_POST['course']);

      $sql = "INSERT INTO students (first, last, course) VALUES ('$first_name', '$last_name', '$course_name')";

      $this->query($sql);
    }

  }

  public function get_students() {
    $this->open_db_connection();
    $sql = "SELECT * FROM students";
    $result = $this->connection->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo    "<tr>" .
                    "<td>". $row["first"]. "</td>" .
                    "<td>". $row["last"]. "</td>" .
                    "<td>". $row["course"]. "</td>" .
                  "</tr>";
      }
    } else {
        echo "0 results";
    }
    $this->connection->close();
  }

}

$form = new Form();
$form->post_form();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    th, td {
      border: 1px solid #333;
      padding: 20px;
    }
  </style>
</head>
<body>
  <form action="form.php" method="post">
    <input required type="text" name="first" placeholder="first name">
    <input required type="text" name="last" placeholder="last name">
    <input required type="text" name="course" placeholder="course name">
    <input type="submit" name="submit">
  </form>
  <table>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Course Name</th>
    </tr>
    <? $form->get_students(); ?>
  </table>
</body>
</html>
