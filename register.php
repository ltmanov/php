<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   require('dbconnection.php');
     //Grab Post data...could be dangerous because of XSS or SQL injection
     $username = $_POST['username'];
     // Sanitize the $username by remove tags
     $username = filter_var($username, FILTER_SANITIZE_STRING);
     //Trim whitespace from the beginning and end of $username
     $username = trim($username);
     //Remove slashes from $username, no / allowed
     $username = str_replace("/","",$username);
     $username = str_replace("\\","",$username);
     //Remove white space from middle of string
     $username = preg_replace("/\s+/","",$username); // first parameter is string to look, second is what to replace it with

     //Grab Post data...password will be hashed so no need to sanitize
   $username=$_POST['username'];
   $password=$_POST['password'];
   $password=password_hash($password, PASSWORD_BCRYPT);//5.5 and higher for this function
   $sql="INSERT INTO users (username, password) VALUES ('$username','$password')";
   $conn->query($sql);
   header('Location: login.php');
}
//ubuntu 16.04 - 5.6 ; 18.04 - 7.2; redhat and centos is still stuck on 5.4
if (isset($_SESSION['username']))
{
  require('nav.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <title></title>
 </head>
 <body>
   <form method="post" action="">
     <input type="text" name="username"> <br>
     <input type="password" name="password"> <br>
     <input type="submit">
   </form>
 </body>
</html>
