<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

<?php
$username=$_POST['username'];
$password=$_POST['password'];

?>

  </head>
  <body>
    <form method="post" action="">
      <input type="text" name="username" placeholder="Enter Username..."><br />
      <input type="password" name="password">
      <br />
      <input type="submit" value="go">
    </form>

<?php
if (isset($username) {
  echo "Username was: ".$username;
//  echo "<br>";
//  echo "Password was ".$password;
}
if (isset($password)){
  echo $username;
}

 ?>

  </body>
</html>
