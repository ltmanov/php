<?php
session_start(); // can use require-NEEDED or include
require('dbconnection.php'); //die can kill this page as well


//if(isset($_POST['username']))
//  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    echo "Got this far 1!";
    //sql statement to execute
    $sql="SELECT username, password FROM users WHERE username = $username";
    echo "Got this far 2!";
    // //execute the sql and return the array to $result
    $result = $conn->query($sql);   //extracting the returned query information
    echo "Got this far 3!";



    while ($row = $result->fetch_assoc())//$row=mysqli_fetch_assoc($result); //$row = $result->fetch_assoc()
    {//loops through all the values in the arrays
      $user = $row['username'];
      $pass = $row['password'];
        if (($user == $username) && ($password == $pass))
         {//row is database value
           $_SESSION['username'] = $username;//used to authenticate our session to stay logged in;
         }
    }
    echo "Got this far 4!";
    //$result->free();
    //$mysqli->close();
    echo "Got this far 5!";
  //}

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

<?php echo "Logged in as: ". $_SESSION['username']; ?>

  </body>
</html>
