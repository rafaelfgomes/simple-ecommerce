 <?php

  require_once 'config/app.php';  
  require_once 'config/database.php';  

  spl_autoload_register(function ($className) {
    require_once 'libraries/'.$className.'.php';
  });
