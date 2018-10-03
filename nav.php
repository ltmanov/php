<?php
if (!isset($_SESSION['username']))//check to see session is started
{
  header('Location: login.php');
}
?>
<br />
<?php
//if tree for different pages
if (basename($_SERVER['PHP_SELF']) == "register.php") {
  echo "<a href=register.php><strong> | Register</strong></a>";
} else {
  echo "<a href=register.php> | Register</a>";
}

if (basename($_SERVER['PHP_SELF']) == "users.php") {
  echo "<a href=users.php><strong> | Users</strong></a>";
} else {
  echo "<a href=users.php> | Users</a>";
}

if (basename($_SERVER['PHP_SELF']) == "upload.php") {
  echo "<a href=upload.php><strong> | Upload</strong></a>";
} else {
  echo "<a href=upload.php> | Upload</a>";
}

if (basename($_SERVER['PHP_SELF']) == "login.php") {
  echo "<a href=login.php><strong> | Login</strong></a>";
} else {
  echo "<a href=login.php> | Login</a>";
}
?>
<br />
