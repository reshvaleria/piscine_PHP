#!/usr/bin/php
<?php
$something = fopen("php://stdin", "r");
while ($something) {
    echo("Enter a number: ");
$something = fgets()
    if (feof($something)) {
        echo "\n";
        exit();
    }
}
