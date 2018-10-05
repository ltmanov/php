<?php
$cookie_name ="user";
if (isset($_COOKIE[$cookie_name])){
    $visit=2;
    $last_visit = $_COOKIE[$cookie_name];
    $cookie_value = "".date('m-d-Y')."";
    setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
}
else {
  $visit=1;
  $cookie_value = "".date('m-d-Y')."";
  setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
      <?php
      if ($visit==1)
      {
        ?>
        <p>This is your first visit!<br />We use cookies!<br />We have to tell you this!<br /></p>
        <?php
      }
      else if ($visit==2)
      {
        ?>
        <p>Thanks for revisiting this page! Your last visit was on: <?php echo $last_visit ?> . </p>
        <?php
      }
      else{}
       ?>
   </body>
 </html>
