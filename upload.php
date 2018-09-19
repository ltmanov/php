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

if (!file_exists("uploads/" . $_SESSION['username'])) {
  mkdir("uploads" . $_SESSION['username'],0777,true);
}

$target_dir = "uploads/" . $_SESSION['username'] . "/";
$target_file = $target_dir . basename($_FILES['upload']['name']);//location to put
$uploadVerification=true;

//check to see if file exists
if (file_exists($target_file)) {  $uploadVerification=false;  $ret = "Sorry file already exists";}

//$finfo = finfo_open(FILEINFO_MIME_TYPES);
$file_type = $_FILES['upload']['type'];
switch ($file_type){
  case "image/jpeg":
    $uploadVerification = true;
    break;
  case "image/png":
    $uploadVerification = true;
    break;
  case "image/gif":
    $uploadVerification = true;
    break;
  case "application/pdf":
    $uploadVerification = true;
    break;
  default:
    $uploadVerification = false;
    $ret = "Sorry only jpg, png, gif, and pdf files are allowed";
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
  //check to see if uploads folder exists
  if(!file_exists("uploads")){
    //if uploads folder does not exists create it
    mkdir("./uploads");
  }

  if(!file_exists("uploads/" . $_SESSION['username'])) {
    mkdir("uploads/" . $_SESSION['username']);
  }

  $target_dir = "uploads/" . $_SESSION['username'] . "/";
  $target_file = $target_dir . basename($_FILES['upload']['name']);
  $uploadVerification = true;

  //Lets check to see if the file already exists
  if(file_exists($target_file)){
    $uploadVerification = false;
    $ret = "Sorry file already exists";
  }

  //Check file for type
  $file_type = $_FILES['upload']['type'];
  switch ($file_type){
    case "image/jpeg":
      $uploadVerification = true;
      break;
    case "image/png":
      $uploadVerification = true;
      break;
    case "image/gif":
      $uploadVerification = true;
      break;
    case "application/pdf":
      $uploadVerification = true;
      break;
    default:
      $uploadVerification = false;
      $ret = "Sorry only jpg, png, gif, and pdf files are allowed";
  }


  if($_FILES['upload']['size'] > 1000000 ){
    $uploadVerification = false;
    $ret = "Sorry file is too big";
  }


  if ($uploadVerification) {
    move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
  }
}
?>
Upload your file.
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="upload" >
  <br />
  <input type="submit">
</form>

<h5 style="color:red;">
  <?php if ($ret) { echo $ret; } ?>
</h5>

-->
