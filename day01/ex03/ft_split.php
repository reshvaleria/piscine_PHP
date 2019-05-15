<?php
function ft_split($str)
{
	$split_array = explode(" ", $str);
    foreach ($split_array as $k=>$v) {
    	if ($split_array[$k] == "") {
        	unset($split_array[$k]);
        }
    }
    sort($split_array);
	return ($split_array);
}
?>