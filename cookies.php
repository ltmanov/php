
  <?php
  $cookie_name ="user";

  if (isset($_COOKIE[$cookie_name])){
      // "Current time " .time();
    //  echo "Cookie  time " .$_COOKIE[$cookie_name];
      echo "You were here last " .(time() - $_COOKIE[$cookie_name]). " seconds ago.";

      $cookie_value = time();
      setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
  }
  else {
    echo "This is your first time here. We are required to let you know that we use cookies.";
    $cookie_value = time();
    echo "Cookie time: ". $cookie_value;
    setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
  }
   ?>
