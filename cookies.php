<?php
//setcookie(name, value, expire, path, domain, secure, httponly);
$cookie_name ="user";
$cookie_value="bob";
//86400 = 1 day
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if (isset($_COOKIE['user'])) {
        echo "You have been here before.";
        setcookie($cookie_name,$cookie_value, time() + (86400*30), "/");
      }
      else {
        echo "This is your first time here.";
      }
     ?>

  </body>
</html>
