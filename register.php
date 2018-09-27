<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   require('dbconnection.php');
   $username=$_POST['username'];
   $password=$_POST['password'];
   $password=password_hash($password, PASSWORD_BCRYPT);//5.5 and higher for this function
   $sql="INSERT INTO users (username, password) VALUES ('$username','$password')";
   $conn->query($sql);
   require('nav.php');
}
//ubuntu 16.04 - 5.6 ; 18.04 - 7.2; redhat and centos is still stuck on 5.4
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
