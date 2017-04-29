<!DOCTYPE html>

<html>
  <head>
    <title>My Lecture Reader</title>
  </head>
  <body>
    <h1>CSCI S-75</h1>
    <ul>
      <?

         $dom = simplexml_load_file("lectures.xml");
         foreach ($dom->xpath("/lectures/lecture[@number='3']") as $lecture) // predicate [@number='3'] allows you to filter and return just lecture 3 based from the number attribute in lecture xml tag.
         {
             print "<li>";
             print "Lecture" . $lecture['number'] . ":";
             print $lecture->title;
             print "</li>";
         }

      ?>
    </ul>
  </body>
</html>
