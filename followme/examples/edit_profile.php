<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require('dbconnection.php');
  $sql ="UPDATE fm_users SET firstname='".$_POST['firstname']."', lastname='".$_POST['lastname']."',
  title='".$_POST['title']."', descr='".$_POST['descr']."' WHERE userid = " . $_SESSION['userid'];
  $result = $conn->query($sql);
  $sql="SELECT * FROM fm_users WHERE userid = " . $_SESSION['userid'];
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    if (($_SESSION['userid'] == $row['userid']))
		{
      $_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];
			$_SESSION['title'] = $row['title'];
			$_SESSION['descr'] = $row['descr'];
			$_SESSION['image'] = $row['image'];
			header('Location: profile.php');
    }
  }//ends while loop for post checking

	if (isset($_FILES['upload']) ) {

		//if (!file_exists("images")){mkdir("./images");}//if uploads doesnt exist, make it

		//if (!file_exists("images/" . $_SESSION['userid'])) { mkdir("images/" . $_SESSION['userid'],0777,true); }

		$target_dir = "images/"; // . $_SESSION['userid'] . "/";

		$target_file = $target_dir . basename($_FILES['upload']['name']);//location to put

		$uploadVerification=true;

		//check to see if file exists
		if (file_exists($target_file)) {  $uploadVerification=false;  $ret = "Sorry file already exists";}

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

		if ($uploadVerification){move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
			//adds sql UPDATE
			$file_name = basename($_FILES['upload']['tmp_name']);
			$sql2 ="UPDATE fm_users SET image='"images/". $file_name' WHERE userid = " . $_SESSION['userid'];
		  $result2 = $conn->query($sql2);
		}
	}



}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Edit Profile Page</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	<!-- Bootstrap core CSS     -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>
    <!--     Fonts and icons     -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/nucleo-icons.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="150">
  <div class="container">
<div class="navbar-translate">
  <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-bar"></span>
		<span class="navbar-toggler-bar"></span>
		<span class="navbar-toggler-bar"></span>
  </button>
  <a class="navbar-brand" href="#">FOLLOW ME</a>
</div>
	<div class="collapse navbar-collapse" id="navbarToggler">
    <ul class="navbar-nav ml-auto">
				<?php require('nav.php');//location of navigation bar is here ?>
    </ul>
  </div>
</div>
</nav>

<div class="wrapper">
<div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
<div class="filter">
</div>
</div>

<div class="section landing-section">
<div class="container">
<div class="row">
<div class="col-md-8 ml-auto mr-auto">
<h2 class="text-center">Edit Your Profile!</h2>

<!-- begins first row -->
<form class="contact-form" action ="" method="post" enctype="multipart/form-data">
<div class="row">

<div class="col-md-6">
<label>First Name</label>
<div class="input-group">
<span class="input-group-addon">
<i class="nc-icon nc-single-02"></i>
</span>
<input type="text" name="firstname" class="form-control" placeholder="<?php echo $_SESSION['firstname']; ?>">
</div>
</div>

<div class="col-md-6">
<label>Last Name</label>
<div class="input-group">
<span class="input-group-addon">
<i class="nc-icon nc-email-85"></i>
</span>
<input type="text" name="lastname" class="form-control" placeholder="<?php echo $_SESSION['lastname'];?>">
</div>
</div>

</div>
<!-- ends first row -->

<label>Title</label>
<div class="input-group">
<span class="input-group-addon">
<i class="nc-icon nc-email-85"></i>
</span>
<input type="text" name="title" class="form-control" placeholder="<?php echo $_SESSION['title']; ?>">
</div>

<label>Message</label>
<textarea class="form-control" name="message" rows="4" placeholder="<?php echo $_SESSION['descr']; ?>"></textarea>

<label>Upload A New Profile Picture:</label>
<input type="file" name="upload">

 <!-- <label>Upload A New Profile Picture:</label>
 <div class="input-group">
	 <form action="" method="post" enctype="multipart/form-data">
	   <input type="file" name="upload">
	   <input type="submit">
	  <label><h5 style="color:red;"> <?php if($ret){echo $ret;}  ?> </h5></label>
 </div> -->

<div class="row">
  <div class="col-md-4 ml-auto mr-auto">
     <button class="btn btn-danger btn-lg btn-fill">Update</button>
   </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- ends the wrapper class -->

<footer class="footer section-dark">
  <div class="container">
    <div class="row">
      <nav class="footer-nav">
          <ul>
              <li><a href="https://www.creative-tim.com">Creative Tim</a></li>
              <li><a href="http://blog.creative-tim.com">Blog</a></li>
              <li><a href="https://www.creative-tim.com/license">Licenses</a></li>
          </ul>
      </nav>
        <div class="credits ml-auto"><span class="copyright"> © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim</span>
          </div>
      </div>
  </div>
</footer>
</body>

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>
