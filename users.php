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
    <th>Action</th>
  </tr>

<?php
while ($row = $result->fetch_assoc())
{
  echo "<tr>";
    echo "<td>" . $row['userid'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>
                  <form action=\"\" method=\"post\">
                    <input type=\"text\" value=\"$row[userid]\">
                    <input type=\"submit\" value=\"Delete\">
                  </form>
            </td>";
  echo "</tr>";
}
?>
</table>



   </body>
 </html>
