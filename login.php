<?php
session_start();
// can use require-NEEDED or include
require('dbconnection.php'); //die can kill this page as well

if(isset($_POST['username'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
}

$sql="SELECT username, password FROM users WHERE username= $username";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<!--makes post variables-->
    <?php
        $username=$_POST['username'];
        $password=$_POST['password'];

        if (isset($_POST['logout'])) {
          unset($_SESSION['username']);
        }
        ?>
<!--body section-->
  </head>
  <body>
    <form method="post" action="">
      <input type="text" name="username" placeholder="Enter Username...">
      <br />
      <input type="password" name="password" >
      <br />
      <input type="submit" value="go">
      <input type="submit" name="logout" value="logout"><!--value is text on button, submit makes pages reload-->
    </form>
<!--password creation-->
<?php
if (isset($username) && isset($password))
{
  //"Username was ".$username;
  //echo "<br>";
  //echo "Password was ".$password;
  if ($username == "lev" && $password == "pass")
  {
    $_SESSION['username']=$username;
    echo "Logged in as: ". $_SESSION['username'];
  }



}

 ?>

  </body>
</html>
