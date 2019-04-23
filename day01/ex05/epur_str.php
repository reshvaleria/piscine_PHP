#!/usr/bin/php
<?php
if ($argc == 2) {
    $arr = explode(" ", $argv[1]);
    $x = count($arr);
    for ($i = 0; $i < $x; $i++) {
        if ($arr[$i] == "") {
            unset($arr[$i]);
        }
    }
    $arr = array_values($arr);
    for ($i = 0; $i < count($arr); $i++) {
        echo ($i == count($arr) - 1) ? $arr[$i] : $arr[$i] . " ";
    }
    echo "\n";
}
?>
