<?php
$cookie_name ="user";
$cookie_value = date('Y-m-d');

if (isset($_COOKIE[$cookie_name])){
    $last_visit= $_COOKIE[$cookie_value];
    echo "You have been here before: at" . $_COOKIE[$cookie_value];
    $cookie_value = date('Y-m-d');
    setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
}
else {
  echo 'Now:       '. date('Y-m-d') ."\n";
  echo "This is your first time here. We use cookies, we are required to let you know that we use cookies.";
  setcookie($cookie_name,$cookie_value, time() + (86400*30), "/");
  echo 'Cookie value is : '. $_COOKIE[$cookie_name];
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


  </body>
</html>

<!-- <?php
//setcookie(name, value, expire, path, domain, secure, httponly);

  if (isset($_COOKIE['user'])) {

    //setcookie($cookie_name,$cookie_value, time() - (60), "/");
    // going back in time, makes an expired cookie, which browser will delete
  }
  else {//make the cookie


  //setcookie($cookie_name,$cookie_value, time() + (86400*30), "/");
  //php7 allows this go work, otherwise would have to be up to before any html code
  //to see cookies in chrome-> settings to advanced settings to content settings to see all cookies
  }
 ?> -->