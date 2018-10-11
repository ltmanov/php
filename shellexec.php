<?php
$output = shell_exec('ls -lah');
echo "<pre>$output</pre>";

$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";

$file_test = file_exists("test");
  if ($file_test) {
    $folder_test = is_dir("test");
    if ($folder_test) {
      echo "test exists, and is a folder";

      $testArray =scandir("test/");
      //var_dump($testArray);
      foreach ($testArray as $key => $value) {
        if ($value == "." || $value == ".." ){continue;}
        echo "<br />".$value;
      }
    } else {
      echo "test exists and is a file";
    }
  } else {
    mkdir("test");
  }

$dir = 'test';
$files1 = scandir($dir);
print_r($files1);

echo "<br />";
$w = shell_exec('w');
echo "$w";
echo "<br />";
$who = shell_exec('who');
echo "$who";


?>
