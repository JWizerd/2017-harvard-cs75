<?
define('DB_HOST', 'localhost'); // constants are good for db creds because they are immutable
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

  public $error;

  public function post_form() {
    $this->open_db_connection();
    $this->process_query();
  }

  public function process_query() {
    if (isset($_POST['submit'])) {

      if (empty($_POST['first']) || empty($_POST['last']) || empty($_POST['course'])) {
        echo '<p style="color: red;">please fill out entire form</p>';
      } else {
        $first_name = $_POST['first'];
        $last_name = $_POST['last'];
        $course_name = $_POST['course'];

        $sql = "INSERT INTO students (first, last, course) VALUES ('$first_name', '$last_name', '$course_name')";

        $this->query($sql);
      }
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

  public function val_validation($post_val) {
    if (isset($post_val)) {
      echo $post_val;
    }
  }

}

$form = new Form();

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
  <? $form->post_form(); ?>
  <form action="form.php" method="post">
    <input type="text" name="first" placeholder="first name" value="<?= $form->val_validation(htmlspecialchars($_POST['first'])); ?>">
    <input type="text" name="last" placeholder="last name" value="<?= $form->val_validation(htmlspecialchars($_POST['last'])); ?>">
    <input type="text" name="course" placeholder="course name" value="<?= $form->val_validation(htmlspecialchars($_POST['course'])); ?>">
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
