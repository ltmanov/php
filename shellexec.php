<?php
$output = shell_exec('ls -lah');
echo "<pre>$output</pre>";

if (stripos($ouput,"test"))
{
  echo = "test exists";
}
else {
  echo = "test does not exist";
}

$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";

?>
