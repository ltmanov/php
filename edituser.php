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

$sql ="SELECT * FROM users WHERE userid = " . $_GET['id'] . ";" ;
$result = $conn->query($sql);

echo "<form action=\"\" method=\"post\">";

while ($row = $result->fetch_assoc())
{
  echo "<input type=\"text\" disabled value=\"$row['userid']\"">";

    $row['username'] . "</td>";
    $row['password'] . "</td>";
    
}
else{  echo "You should not be here.";}

?>
