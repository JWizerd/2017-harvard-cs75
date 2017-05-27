
<!DOCTYPE html PUBLIC
     "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Lolcat of teh Day</title>
  </head>
  <body>
    <div align="center" style="padding: 20px;">
      <h1>Lolcat of teh Day</h1>
      <?

          $xml = new SimpleXMLElement(file_get_contents("http://feedproxy.google.com/ICanHasCheezburger?format=xml"));
          $item = $xml->channel->item[0];
          preg_match("/^.* - (.*)</", $item->description, $matches);
          $alt = htmlspecialchars($matches[1], ENT_QUOTES);
          $link = $item->link;
          foreach ($item->children("http://search.yahoo.com/mrss/") as $content)
          {
              $attributes = $content->attributes();
              $src = $attributes["url"];
          }
          print("<a href='{$link}'><img alt='{$alt}' border='0' src='{$src}' /></a>");

      ?>
    </div>
  </body>
</html>

