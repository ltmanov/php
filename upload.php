<?php
if (!isset($_SESSION))
{
  session_start();
}//checks if global variable for session is set
if (!isset($_SESSION['username']))
{//die("Don't even think about it")
  header('Location: login.php');
}

var_dump($_FILES['upload']);// shows what variable is
// echo "<hr />"
if ( isset($_FILES['upload']) ) {
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['upload']['name']);
move_uploaded_file($_FILES['upload']['name'], $target_file);
}
 ?>
 Upload Your File:
 <form action="" method="post" enctype="multipart/form-data">
   <input type="file" name="upload">
   <br />
   <input type="submit">
 </form>
