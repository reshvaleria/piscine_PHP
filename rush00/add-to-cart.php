<?php
session_start();
$item_id = $_GET['item_id'];
$amount = $_GET['amount'];
$array = array($item_id => $amount);
if ($SESSION['basket'][$item_id] > 0)
     $_SESSION['basket'][] = $array;
else
     $_SESSION['basket'][$item_id] += $amount;
header('Location: catalogue.php');
?>