<?php
if (!isset($_SESSION))
{
  session_start();
}//checks if global variable for session is set
if (!isset($_SESSION['username']))//check to see session is started
{
  header('Location: login.php');
}

//bring database fann_get_total_connections
require('dbconnection.php');
//create sql query
$sql = "SELECT * from users";
//execute the query
$result = $conn->query($sql);   //extracting the returned query information
//close db con
$conn->close();
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

<table>

  <tr>
    <th>User Id </th>
    <th>Username </th>
    <th>Password Hash </th>
  </tr>

<?php
while ($row = $result->fetch_assoc())
{
  <tr>
    <td>$row['userid']</td>
    <td>$row['username']</td>
    <td>$row['password']</td>
  </tr>
}
?>

   </body>
 </html>
