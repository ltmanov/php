<?php
if (!isset($_SESSION))
{
  session_start();
}//checks if global variable for session is set
if (!isset($_SESSION['username']))
{//die("Don't even think about it")
  header('login.php');
}

 ?>
 Upload Your File:
 <form action="" method="post" enctype="multipart/form-data">
   <input type="file" name="upload">
   <br />
   <input type="submit">
 </form>
