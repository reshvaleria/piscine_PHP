<?php
include ('sqlconnect.php');
include ('pages/head.php');
include ('pages/navigation.php');

$id = $_GET[id];
if (empty($_SESSION['login']) || empty($_SESSION['id'])) {
    if ($id === 'enter' || !$id) {
        echo "<h2>Вход</h2>"
            . "<div>"
            . "<form action=\"isreg.php\" method=\"post\">"
            . "<input id=\"login\" class=\"registration\" type=\"text\" name=\"login\" placeholder=\"Логин\" required><br />"
            . "<input id=\"pass\" type=\"password\" class=\"registration\" name=\"password\" placeholder=\"Пароль\" required/><br />"
            . "</div>"
            . "<div>"
            . "<br><input type=\"submit\" class=\"button\" value=\"Войти\"><br>"
            . "</div>"
            . "<div>"
            . "<a href=\"user.php?id=registration\" class=\"button\">Создать аккаунт</a>"
            . "</div>"
            . "</form>";
    } else {
        echo "<h2>Регистрация</h2>"
            . "<div class=\"save_user\">"
            . "<form action=\"save-user.php\" method=\"post\">"
            . "<input id=\"login\" class=\"registration\" \" type=\"text\" name=\"login\" placeholder=\"* Логин\" required><br />"
            . "<input id=\"pass\" class=\"registration\" type=\"password\" size=\"20\" maxlength=\"32\" name=\"password\" placeholder=\"* Пароль\" required/><br />"
            . "<input id=\"re_pass\" class=\"registration\" type=\"password\" size=\"20\" maxlength=\"32\" name=\"password2\" placeholder=\"* Повторите пароль\" required><br />"
            . "<input id=\"name\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"name\" placeholder=\"* Имя\" required><br />"
            . "<input id=\"lastname\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"lastname\" placeholder=\"* Фамилия\" required><br />"
            . "<div>"
            . "<br><input type=\"submit\" class=\"button\" value=\"Зарегистрироваться\"><br>"
            . "</div>"
            . "</form>"
            . "<div>"
            . "<a href=\"user.php?id=enter\" class=\"button\">Уже есть аккаунт?<br> Войти</a>"
            . "</div>"
            . "</div>";
    }
} else {
    $user = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$_SESSION[id]'");
    $user = mysqli_fetch_assoc($user);
    echo "<h2>Личный кабинет</h2>"
        . "<p>Здравствуйте, "
        . $user['firstname']
        . " "
        . $user['lastname'] . "!</p>";

    if ($user['rights']==='admin'){
        include ('admin-section.php');
    }
    elseif ($user['rights']==='user'){
        include ('user-section.php');
    }
    echo "<div><a href=\"logout.php\" class=\"button\">Выйти</a></p></div>";
}
include ('pages/footer.php');
mysqli_close ($mysqli);
?>