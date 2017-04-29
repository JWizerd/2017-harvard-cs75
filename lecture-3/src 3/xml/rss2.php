<!DOCTYPE html>

<html>
  <head>
    <title>My RSS Reader</title>
  </head>
  <body>
    <h1>New York Times Technology</h1>
    <ul>
      <?

         $dom = simplexml_load_file("http://feeds.nytimes.com/nyt/rss/Technology");
         foreach ($dom->channel->item as $item)
         {
             $time = strtotime($item->pubDate);
             $date = date("M j, Y", $time);
             print "<li>";
             print "<a href='{$item->link}'>";
             print $item->title;
             print "</a>";
             print " (" . $date . ")";
             print "</li>";
         }

      ?>
    </ul>
  </body>
</html>
