#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
if ($argc == 2) {
    $week = array(1=>'lundi',
        2=>'mardi',
        3=>'mercredi',
        4=>'jeudi',
        5=>'vendredi',
        6=>'samedi',
        7=>'dimanche');
    $eng_w = array(1 => "Monday",
        2 => "Tuesday",
        3 => "Wednesday",
        4 => "Thursday",
        5 => "Friday",
        6 => "Saturday",
        7 => "Sunday");
    $month = array(1 => 'janvier',
        2 => 'février',
        3 => 'mars',
        4 => 'avril',
        5 => 'mai',
        6 => 'juin',
        7 => 'juillet',
        8 => 'août',
        9 => 'septembre',
        10 => 'octobre',
        11 => 'novembre',
        12 => 'décembre');
    $eng_m = array(1 => "January",
        2 => "February",
        3 => "March",
        4 => "April",
        5 => "May",
        6 => "June",
        7 => "July",
        8 => "August",
        9 => "September",
        10 => "October",
        11 => "November",
        12 => "December");
    $input_date = preg_split("/ /", $argv[1]);
    if(count($input_date) !== 5) {
        echo "Wrong Format\n";
        exit;
    }
    if (!preg_match("/^([A-Z])?([a-z]+)$/", $input_date[0]) ||
        !preg_match("/^(([1-2][0-9])|[0-9]|30|31)$/", $input_date[1]) ||
        !preg_match("/^([A-Z])?[a-z|û|é]+$/", $input_date[2]) ||
        !preg_match("/^(19[7-9][0-9]|20[01][0-9])$/", $input_date[3]) ||
        !preg_match("/^([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $input_date[4])) {
            echo "Wrong Format\n";
            exit;
    }
    $input_week = mb_strtolower($input_date[0]);
    $input_month = mb_strtolower($input_date[2]);
    for ($w = 1; $w < 8; $w++) {
        if ($week[$w] === $input_week) {
            $input_date[0] = $eng_w[$w];
            break;
        }
    }
    for ($m = 1; $m < 13; $m++) {
        if ($month[$m] === $input_month) {
            $input_date[2] = $eng_m[$m];
            break;
        }
    }
    if ($w == 8 || $m == 13 || !checkdate($m, $input_date[1], $input_date[3])) {
        echo "Wrong Format\n";
        exit;
    }
    echo strtotime(implode($input_date)) . "\n";
}
?>