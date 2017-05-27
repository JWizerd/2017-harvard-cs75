<?php  
  define('MODEL',  'models/');
  define('CONTROLLER', 'controllers/');
  define('PARTIAL', 'assets/includes/');

  function open_wrap() {
    echo '<div class="container">' .
            '<div class="row">';
  }

  function close_wrap() {
    echo '  </div><!-- row -->' .
          '</div><!-- container -->';
  }
?>