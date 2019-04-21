#!/usr/bin/php
<?php
function ft_print_arr($newarr){
  sort($newarr);
  for ($i = 0; $i < count($newarr); $i++)
    if ($newarr[$i] != "")
      echo $newarr[$i] . "\n";
}

if ($argc > 1) {
  for ($i = 1; $i < $argc; $i++) {
    $arr[$i] = explode(" ", $argv[$i]);
    for ($x = 0; $x < count($arr[$i]); $x++) {
      $newarr = ($i != 1) ? array_merge($tmparr, $arr[$i])
      : $newarr = $arr[$i];
    }
    $tmparr = $newarr;
  }
  ft_print_arr($newarr);
}
?>
