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
function ft_print_arr($arr){
	sort($arr);
	foreach ($arr as $v){
		if ($v != "")
			echo $v . "\n";
	}
}
if ($argc > 1) {
	$arr = $argv;
	unset($arr[0]);
	$str = implode(" ", $arr);
	$arr = ft_array_split($str);
	ft_print_arr($arr);
}
?>