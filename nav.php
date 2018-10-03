<?php
if (!isset($_SESSION))
{
  session_start();
}//checks if global variable for session is set
if (!isset($_SESSION['username']))//check to see session is started
{
  header('Location: login.php');
}

if (basename($_SERVER['PHP_SELF']==users.php)
{
?> <a href=users.php><strong>| Users</strong></a> <?php
}
else{
?> <a href=users.php>Users</a> <?php
}






?>
  <br />
 <a href="register.php">| Register</a>
 <a href="upload.php">| Upload</a>
 <a href="login.php">| Log In</a>
 <br />
