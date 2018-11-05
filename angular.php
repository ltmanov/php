<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$db_host = 'localhost'; // Database is installed on the PHPH server
$db_user = 'lev'; // name to log in to MySQL
$db_password = 'southhills#'; // password to login to MySQL
$db_name = 'lev'; // name of the database within MySQL
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error)
{
  die("Connection Failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT first_name, last_name, city FROM angular_people");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Name":"' . $rs["first_name"] . '",';
    $outp .= '"Last_Name":"' . $rs["last_name"] . '",';
    $outp .= '"City":"' . $rs["city"] . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
