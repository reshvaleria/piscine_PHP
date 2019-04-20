#!/usr/bin/php
<?php
while (true) {
  echo("Enter a number: ");
  $something = trim(fgets(STDIN));
  if(is_numeric($something))
  {
    if ($something % 2)
      echo "The number " . $something . " is odd\n";
    else
      echo "The number " . $something . " is even\n";
  }
  else
    echo "'$something' is not a number\n";
  if (feof(STDIN)) {
    echo "\n";
    break;
  }
}
