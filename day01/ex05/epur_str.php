#!/usr/bin/php
<?php
function ft_array_split($str) {
	$spaces = array("\t", "\n", "\v", "\f", "\r", " ");
	$arr = array();
	foreach ($spaces as $k=>$v) {
		$arr = explode($v, $str);
		$str = implode($spaces[$k + 1], $arr);
	}
	return ($arr);
}
if ($argc == 2) {
    $arr = ft_array_split($argv[1]);
	foreach ($arr as $k=>$v) {
		if ($arr[$k] == "") {
			unset($arr[$k]);
		}
	}
	$arr = array_values($arr);
	foreach ($arr as $k=>$v) {
		echo ($k == count($arr) - 1) ? $v : $v . " ";
	}
	echo "\n";
}
?>