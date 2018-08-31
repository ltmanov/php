<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
//makes post variables
    <?php
        $username=$_POST['username'];
        $password=$_POST['password'];
        ?>
//body section
  </head>
  <body>
    <form method="post" action="">
      <input type="text" name="username" placeholder="Enter Username...">
      <br />
      <input type="password" name="password" >
      <br />
      <input type="submit" value="go">
    </form>
//password creation
<?php
if (isset($username) && isset($password))
{
  //echo "Username was ".$username;
  //echo "<br>";
  //echo "Password was ".$password;
  if ($username == "lev" && $password ="pass")
  {
    $_SESSION['Username']=$username;
  }

  echo "Logged in as: ". $_SESSION['username'];

}

 ?>

  </body>
</html>
