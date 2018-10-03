<?php
session_start(); // can use require-NEEDED or include
require('dbconnection.php'); //die can kill this page as well
require('nav.php');

if(isset($_POST['username']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    //sql statement to execute
    $sql="SELECT username, password FROM users WHERE username = '$username'";//vars must be '' for sql
    // //execute the sql and return the array to $result
    $result = $conn->query($sql);   //extracting the returned query information
    while ($row = $result->fetch_assoc())//$row=mysqli_fetch_assoc($result); //$row = $result->fetch_assoc()
    {//loops through all the values in the arrays
        if (($username == $row['username']) && password_verify($password, $row['password']))
         {//row is database value
           $_SESSION['username'] = $username;//used to authenticate our session to stay logged in;
           header('Location: login.php');
         }
    }//
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
        $username=$_POST['username'];
        $password=$_POST['password'];

        if (isset($_POST['logout'])) {
          unset($_SESSION['username']);


        }
    ?>
  </head>
  <body>
    <br />

    <?php
    if (!isset($_SESSION['username']))//check to see session is started
    {
    <a href="register.php">| Register</a>
    ?>

    <br />
    <form method="post" action="">
      <input type="text" name="username" placeholder="Enter Username...">
      <br />
      <input type="password" name="password" >
      <br />
      <input type="submit" value="go">
      <input type="submit" name="logout" value="logout"><!--value is text on button, submit makes pages reload-->
    </form>

<?php echo "Logged in as: ". $_SESSION['username']; ?>

  </body>
</html>
