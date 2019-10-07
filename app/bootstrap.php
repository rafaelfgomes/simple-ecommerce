 <?php

  //Config
  require_once 'config/app.php';  
  require_once 'config/database.php';
  
  //Helpers
  require_once 'helpers/redirect_helper.php';
  require_once 'helpers/session_helper.php';

  spl_autoload_register(function ($className) {

    require_once 'libraries/'.$className.'.php';
  
  });
