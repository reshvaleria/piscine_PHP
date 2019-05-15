<?php
session_start();
if ($_GET['clear_basket']) {
    unset($_SESSION['basket']);
}
header('Location: basket.php');
?>