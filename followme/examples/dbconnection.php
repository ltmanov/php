<?php //setting up the database connection
$db_host = 'localhost'; // database is installed on php server
$db_user = 'lev'; // name to login to mysql
$db_password = 'southhills#'; // password
$db_name = 'lev'; //name of db
$conn = new mysqli($db_host,$db_user,$db_password,$db_name);
if ($conn->connect_error){
  die("Connection failed: ". $conn->connect_error);
}
?>
