<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>



  </head>
  <body>
    <form method="post" action="">
      <input type="text" name="username" placeholder="Enter Username..."><br />
      <input type="password" name="password" value="" >
      <br />
      <input type="submit" value="go">
    </form>
<?php
    $username=$_POST['username'];
    $password=$_POST['password'];

    ?>
<?php
if (isset($username)==true){
  echo "Username was: ".$username;
}
if (isset($password)==true){
  echo "Password was: ".$password;
}

 ?>

  </body>
</html>
