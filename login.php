<?php
session_start(); // can use require-NEEDED or include
require('dbconnection.php'); //die can kill this page as well

if(isset($_POST['username']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    //sql statement to execute
    $sql="SELECT username, password FROM users WHERE username = $username";
    // //execute the sql and return the array to $result
    $result = $conn->query($sql);   //extracting the returned query information
    //while ( $row = $result->fetch_assoc()) )//$row=mysqli_fetch_assoc($result); //$row = $result->fetch_assoc()
    // {//loops through all the values in the arrays
    //   if (($username == $row['username']) && ($password == $row['password'])
    //     {//row is database value
    //       $_SESSION['username']=$username;//used to authenticate our session to stay logged in;
    //     }
    //}

    if ($result = $mysqli->query($sql)) {

        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            printf ("%s (%s)\n", $row["username"], $row["password"]);
        }

        /* free result set */
        $result->free();
    }

    /* close connection */
    $mysqli->close();


  }
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
