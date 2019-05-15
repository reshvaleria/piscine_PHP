#!/usr/bin/php
<?php
function ft_sort($str1, $str2) {
	$lower1 = strtolower($str1);
	$lower2 = strtolower($str2);
	$cmp_str = "abcdefghijklmnopqrstuvwxyz0123456789!" . '"' ."#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	for ($i = 0; $str1[$i] && $str2[$i]; $i++) {
		$needle1 = strpos($cmp_str, $lower1[$i]);
		$needle2 = strpos($cmp_str, $lower2[$i]);
		if ($needle1 < $needle2)
			return (-1);
		else if ($needle1 > $needle2)
			return (1);
	}
	return (0);
}
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
	usort($arr, "ft_sort");
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
