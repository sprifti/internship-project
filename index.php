  <?php

    require_once('model/connect.php');
    require_once('model/user.php');

    session_start();

    if(isset($_COOKIE["id"]))
    {
      $_SESSION["id"] = $_COOKIE["id"];
      $controller = 'user';
      $action     = 'welcome';
    }

     if (isset($_GET['controller']) && isset($_GET['action'])) {
      $controller = $_GET['controller'];
      $action     = $_GET['action'];
    } else {
      $controller = 'user';
      $action     = 'home';
    }

  if(isset($_GET['response']) && $_GET['response'] == 'json'){
    require_once('routes.php');
  }else{
   require_once('view/mainPage.php');
  }

  ?>
