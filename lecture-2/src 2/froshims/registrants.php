<?
    // connect to database
    mysql_connect("localhost", "jharvard", "crimson");
    mysql_select_db("jharvard_froshims");

    // prepare query
    $sql = "SELECT * FROM registrants";

    // execute query
    $result = mysql_query($sql);
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Frosh IMs</title>
  </head>
  <body>
    <ul>
      <?
          // iterate over results
          while ($row = mysql_fetch_array($result))
          {
              print("<li>");
              print(htmlspecialchars($row["name"]));
              print("</li>");
          }
      ?>
    </ul>
  </body>
</html>
