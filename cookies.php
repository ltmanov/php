<?php
$cookie_name ="user";
$cookie_value = "".date('Y-m-d')."";

if (isset($_COOKIE[$cookie_name])){
    $lastVisit= $_COOKIE[$cookie_name];
    echo "You have been here before at" .$_COOKIE[$cookie_name];
    $cookie_value = "".date('Y-m-d')."";
    setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
}
else {
  echo 'Now:'. date('Y-m-d') ."\n";
  echo "This is your first time here. We use cookies, we are required to let you know that we use cookies.";
  setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
}
 ?>
