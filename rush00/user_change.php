<?php
    include ('sqlconnect.php');
    include ('pages/head.php');
    include ('pages/navigation.php');

    $id = $_SESSION['id'];
    $result = mysqli_query($mysqli, "SELECT password FROM users WHERE id='$id'");
    $result = mysqli_fetch_assoc($result);
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    if ($password && $password != '' && (hash('whirlpool', $password) === $result['password']))
    {
        echo "<p>Введите данные для изменения</p>
         <div class=\"save_user\">"
        . "<form action=\"update_sql.php\" method=\"post\">"
        . "<input id=\"login\" class=\"registration\" \" type=\"text\" name=\"new_login\" placeholder=\"* Введите новый логин\" ><br />"
        . "<input id=\"pass\" class=\"registration\" type=\"password\" size=\"20\" maxlength=\"32\" name=\"new_password\" placeholder=\"* Новый пароль\" /><br />"
        . "<input id=\"re_pass\" class=\"registration\" type=\"password\" size=\"20\" maxlength=\"32\" name=\"new_password2\" placeholder=\"*Повторите пароль\" ><br />"
        . "<input id=\"name\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"new_name\" placeholder=\"* Имя\" ><br />"
        . "<input id=\"lastname\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"new_lastname\" placeholder=\"* Фамилия\" ><br />"
        . "<div>"
        . "<br><input type=\"submit\" class=\"button\" value=\"Изменить\"><br>"
        . "</div>"
        . "</form>"
        . "</div>";
    } else {
        echo "<p>Введен неверный пароль</p>
        <form action=\"user.php\" method=\"\">"
        . "<input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Личный кабинет\">"
        . "</form>";
    }
    include ('pages/footer.php');
    }
?>