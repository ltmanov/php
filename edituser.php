<?php
if (!isset($_SESSION))
{
  session_start();
}//checks if global variable for session is set
if (!isset($_SESSION['username']))//check to see session is started
{
  header('Location: login.php');
}
if (isset($_GET['id']) && $_GET['edit']=="edit"){
  require('dbconnection.php');

  if (isset($_POST['username']) && isset($_POST['submit']))
  {
    $sql ="UPDATE users SET username=". $_POST['username'] . " WHERE userid = " . $_POST['userid'];
    $result = $conn->query($sql);
    echo ("user id is: ".$_POST['userid'])
  }


  $sql ="SELECT * FROM users WHERE userid = " . $_GET['id'];
  $result = $conn->query($sql);

  echo "<form action=\"\" method=\"post\">";

  while ($row = $result->fetch_assoc())
  {
    echo "<input name=\"userid\" type=\"text\" disabled value=\"" . $row['userid'] . "\">";
    echo "<br />";
    echo "<input name=\"username\" type=\"text\" value=\"" . $row['username'] . "\">";
    echo "<br />";
    echo "<input name=\"password\" type=\"text\" value=\"" . $row['password'] . "\">";
    echo "<br />";
    echo "<input type=\"submit\" name=\"submit\" value=\"change\">";

  }
  echo "</form>";
}
else{
  echo "You should not be here.";}

?>
