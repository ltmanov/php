<?php
$cookie_name ="user";
$cookie_value = "".date('Y-m-d');

if (isset($_COOKIE[$cookie_name])){

    echo "You have been here before at";

    setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
    print_r($_COOKIE);.
    var_dump($_COOKIE);
}
else {
  echo 'Now:'. date('Y-m-d') ."\n";
  echo "This is your first time here. We use cookies, we are required to let you know that we use cookies.";

  setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
  print_r($_COOKIE);
  var_dump($_COOKIE);
}
 ?>
