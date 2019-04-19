#!/usr/bin/php
<?php
$something = fopen("php://stdin", "r");
while ($something) {
    echo("Enter a number: ");

    if (feof($something)) {
        echo "\n";
        exit();
    }
}
