<?php
$cookie_name ="user";
$cookie_value = "".date('m-d-Y')."";

if (isset($_COOKIE[$cookie_name])){
    echo "Your last visit was on:  " .$_COOKIE[$cookie_name];
    $cookie_value = "".date('m-d-Y')."";
    setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
}
else {
  echo "This is your first time here. We are required to let you know that we use cookies.";
  setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
}
 ?>
