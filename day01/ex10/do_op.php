#!/usr/bin/php
<?php
if ($argc == 4) {
	$num1 = trim($argv[1]);
	$num2 = trim($argv[3]);
	$op = trim($argv[2]);
    if ($op == '+')
        echo $num1 + $num2;
    elseif ($op == '-')
        echo $num1 - $num2;
    elseif ($op == '*')
        echo $num1 * $num2;
    elseif ($op == '/')
        echo $num1 / $num2;
    elseif ($op == '%')
        echo $num1 % $num2;
} else
	echo "Incorrect Parameters";
echo "\n"
?>