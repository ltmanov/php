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
  if ( !file_exists("uploads")){
    //if uploads doesnt exist, make it
    mkdir("./uploads");
  }

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['upload']['name']);//location to put
$uploadVerification=true;

//check to see if file exists
if (file_exists($target_file)) {  $uploadVerification=false;  $ret = "Sorry file already exists";}

//$finfo = finfo_open(FILEINFO_MIME_TYPES);
$file_type = $_FILES['upload']['tmp_file'];
switch ($file_type) {
  case "image/jpeg":
    $uploadVerification=true;
    break;
  case "image/png":
    $uploadVerification=true;
    break;
  case "image/gif":
    $uploadVerification=true;
    break;
  case "application/pdf":
    $uploadVerification=true;
    break;
  default:
    $uploadVerification=false;
    $ret = "Sorry only jpg, png, gif, pdf files are allowed.";
}

if ($_FILES['upload']['size'] > 1000000){ $uploadVerification=false; $ret = "Sorry file is too big"; }

if ($uploadVerification){move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);}
}
 ?>

 Upload Your File:
 <form action="" method="post" enctype="multipart/form-data">
   <input type="file" name="upload">
   <br />
   <input type="submit">
 </form>

<h5 style="color:red;"> <?php if($ret){echo $ret;}  ?> </h5>










<!--
/////////////////////////////////////////////////////////////////////////////////

 <?php
 if (!isset($_SESSION)){
   session_start();
 }

 if (!isset($_SESSION['username'])){
   header('Location: login.php');
 }

 var_dump($_POST['upload']);
 echo "<hr />";
 var_dump($_FILES['upload']);

 if ( isset($_FILES['upload']) ) {

   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES['upload']['name']);
   move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);

 }


 ?>

 Upload your file.
 <form action="" method="post" enctype="multipart/form-data">
   <input type="file" name="upload" >
   <br />
   <input type="submit">
 </form> -->
