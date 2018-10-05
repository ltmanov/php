<?php
$cookie_name ="user";

if (isset($_COOKIE[$cookie_name])){
    $last_visit= $_COOKIE[$cookie_value];
    echo "You have been here before: at" . $_COOKIE[$cookie_value];
    $cookie_value = date('Y-m-d');
    setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");

    var_dump($_COOKIE);
}
else {
  echo 'Now:'. date('Y-m-d') ."\n";
  echo "This is your first time here. We use cookies, we are required to let you know that we use cookies.";
  $cookie_value = date('Y-m-d');
  setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");

  var_dump($_COOKIE);
}
 ?>
