<?php
include ("sqlconnect.php");
include ('pages/head.php');
include ('pages/navigation.php');

echo "<h3>Регистрация</h3>";
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '')
        unset($login);
}

if (isset($_POST['password'])) {
    $password=$_POST['password'];
    if ($password =='')
        unset($password);
}

if (isset($_POST['password2'])){
    if (!($_POST['password2'] === $password))
        unset($password);
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    if ($name == '')
        unset($name);
}

if (isset($_POST['lastname'])) {
    $lastname = $_POST['lastname'];
    if ($lastname == '') {
        unset($lastname);
    }
}

if (empty($login) || empty($password) || empty($name) || empty($lastname)) {
    exit ("<p>Вы ввели некорректную информацию, вернитесь назад и заполните все поля!</p>"
        . "<a href=\"user.php?id=registration\" class=\"button\">Попробовать еще раз</a>");
}

$login = htmlspecialchars(stripslashes($login));
$password = htmlspecialchars(stripslashes($password));

$name = htmlspecialchars(stripslashes($name));
$lastname = htmlspecialchars(stripslashes($lastname));

mb_internal_encoding("UTF-8");
function mb_ucfirst($text) {
    return mb_strtoupper(mb_substr($text, 0, 1)) . mb_strtolower(mb_substr($text, 1));
}

$login = trim($login);
$password = trim($password);
$password = hash('whirlpool', $password);
$name = trim($name);
$name = mb_ucfirst($name);
$lastname = trim($lastname);
$lastname = mb_ucfirst($lastname);

$result = mysqli_query($mysqli, "SELECT id FROM users WHERE login='$login'");
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

$result2 = mysqli_query($mysqli, "INSERT INTO `users` (`id`, `login`, `password`, `rights`, `firstname`, `lastname`) 
VALUES (NULL, '$login', '$password', 'user', '$name', '$lastname')");

if ($result2)
{
    echo "<p>"
    . $name
    . ", вы успешно зарегистрированы! Теперь вы можете зайти на сайт."
    ."</p>"
    . "<a href=\"user.php?id=enter\" class=\"button\">Войти</a>";
}
else
    echo "<p>Ошибка! Вы не зарегистрированы.</p>";

include ('pages/footer.php');
mysqli_close ($mysqli);
?>
