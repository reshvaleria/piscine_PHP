#!/usr/bin/php
<?php
if ($argc > 2) {
    $key_val = $argv[1];
    if (is_numeric($key_val))
        $key_val = intval($key_val);
    foreach ($argv as $k => $v)
        if ($k > 1) {
			$tmp = explode(":", $v);
			$new_arr[$tmp[0]] = $tmp[1];
        }
	foreach ($new_arr as $k => $v)
	    if ($k === $key_val)
			echo $v . "\n";
}
?>