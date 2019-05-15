<?php
include ('sqlconnect.php');
include ('pages/head.php');
include ('pages/navigation.php');
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
if (empty($login) or empty($password))
    exit ("Для продолжения необходимо заполнить все поля!");
$login = htmlspecialchars(stripslashes($login));
$password = htmlspecialchars(stripslashes($password));
$login = trim($login);
$password = trim($password);
$password = hash('whirlpool', $password);
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE login='$login' and password='$password'");
$user = mysqli_fetch_assoc($result);
if (empty($user['password']))
    exit ("Введённый вами login или пароль неверный.");
else {
    $_SESSION['login']=$user['login'];
    $_SESSION['id']=$user['id'];
    $_SESSION['rights']=$user['rights'];
    $_SESSION['lastname'] = $user['lastname'];
    echo "<div>"
    . "<p>Вы успешно вошли на сайт!</p>"
    . "<p><a href='index.php'>Перейти на главную</a></p>"
    . "<p><a href='basket.php'>К корзине</a></p>"
    . "</div>";
}
include ('pages/footer.php');
mysqli_close ($mysqli);
?>