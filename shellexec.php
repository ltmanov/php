<?php
$output = shell_exec('ls -lah');
echo "<pre>$output</pre>";

if (stripos($ouput,"test")==FALSE)
{
  echo = "test does not exist";
}


$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";

?>
