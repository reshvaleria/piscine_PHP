#!/usr/bin/php
<?php
if ($argc == 2)
{
  $arr = explode(" ", $argv[1]);
  for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] != "")
      echo $arr[$i] . " ";
    }
  echo "\n";
}
?>
