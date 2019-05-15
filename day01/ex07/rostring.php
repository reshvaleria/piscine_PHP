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
function ft_print_rostring($arr) {
	if ($arr[0]) {
		foreach ($arr as $k=>$v) {
			if ($v != "" && $k != 0)
				echo $v . " ";
		}
		echo $arr[0];
	}
	echo "\n";
}
if ($argc > 1) {
	$str = $argv[1];
	$arr = ft_array_split($str);
	ft_print_rostring($arr);
}
?>