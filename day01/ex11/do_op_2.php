#!/usr/bin/php
<?php
function ft_check($ar, $op) {
	$test_ar = explode($op, $ar);
	if ($op === "-" && count($test_ar) > 2 ) {
	    if ($test_ar[0] === "")
	        unset($test_ar[0]);
	    $test_ar = array_values($test_ar);
        if (count($test_ar) > 2) {
            $test_ar[1] = $op . $test_ar[2];
            unset($test_ar[2]);
        }
    }
	if (count($test_ar) != 2) {
		return (0);
	}
	$test_ar[0] = trim($test_ar[0]);
	$test_ar[1] = trim($test_ar[1]);
	if (!is_numeric($test_ar[0]) || !is_numeric($test_ar[1])) {
		return (0);
	}
	return (1);
}
if ($argc == 2) {
	$ar = trim($argv[1]);
	$ar = str_replace(" ", "", $ar);
	$num1 = intval($ar);
	if ($num1 < 0)
		$ar = substr($ar, 1);
	if (strpos($ar, "+") !== false) {
		$sign_pos = strpos($ar, "+");
	} elseif (strpos($ar, "*") !== false) {
		$sign_pos = strpos($ar, "*");
	} elseif (strpos($ar, "/") !== false) {
		$sign_pos = strpos($ar, "/");
	} elseif (strpos($ar, "%") !== false) {
		$sign_pos = strpos($ar, "%");
    } elseif (strpos($ar, "-") !== false) {
	    $sign_pos = strpos($ar, "-");
	} else {
		echo "Syntax Error\n";
		return;
	}
	$op = substr($ar, $sign_pos, 1);
	if (!ft_check($ar, $op)) {
		echo "Syntax Error\n";
		return;
	}
	$num2 = trim(substr($ar, $sign_pos + 1));
	$num2 = intval($num2);
	if ($op === '+')
		echo $num1 + $num2;
	elseif ($op === '-')
		echo $num1 - $num2;
	elseif ($op === '*')
		echo $num1 * $num2;
	elseif ($op === '/')
		echo $num1 / $num2;
	elseif ($op === '%')
		echo $num1 % $num2;
	else
		echo "Syntax Error";
} else
	echo "Incorrect Parameters";
echo "\n"
?>