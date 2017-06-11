<?php 
  function open_wrap() {
    echo '<div class="container">' .
            '<div class="row">';
  }

  function close_wrap() {
    echo '  </div><!-- row -->' .
          '</div><!-- container -->';
  }

  function redirect($filename = "index.php", $variable) {

    if (isset($variable)) {
      header('Location: ' . $filename);
      die();
    }

  }
?>