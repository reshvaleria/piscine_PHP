<?php
function ft_split($str)
{
    $split_array = explode(" ", $str);
    for ($i=0; $i < count($split_array); $i++) {
        if ($split_array[$i] == "") {
            unset($split_array[$i]);
        }
    }
    sort($split_array);
    return ($split_array);
}
