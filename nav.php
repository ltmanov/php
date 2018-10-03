<?php
if (!isset($_SESSION['username']))//check to see session is started
{
  header('Location: login.php');
}
//if tree for different pages
if (basename($_SERVER['PHP_SELF']) == "register.php") {
  echo "<a href=users.php><strong> | Register</strong></a>";
} else {
  echo "<a href=users.php> | Register</a>";
}

if (basename($_SERVER['PHP_SELF']) == "users.php") {
  echo "<a href=users.php><strong> | Users</strong></a>";
} else {
  echo "<a href=users.php> | Users</a>";
}

if (basename($_SERVER['PHP_SELF']) == "upload.php") {
  echo "<a href=users.php><strong> | Upload</strong></a>";
} else {
  echo "<a href=users.php> | Upload</a>";
}

if (basename($_SERVER['PHP_SELF']) == "login.php") {
  echo "<a href=users.php><strong> | Login</strong></a>";
} else {
  echo "<a href=users.php> | Login</a>";
}


?>
