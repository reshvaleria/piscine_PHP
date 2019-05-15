<?php
session_start();
$user = 'root';
$password = 'prometey12345';
$host = '127.0.0.1';
$port = 3306;
$db = 'onlineshop';
$articles = 'articles';
$mysqli = @mysqli_connect($host, $user, $password, $db);
if (mysqli_connect_errno($mysqli)) {
    echo  "<h3>Ошибка</h3>"
        . "<p>Не удалось подключиться к MySQL: " . mysqli_connect_error() . "</p>";
}
?>