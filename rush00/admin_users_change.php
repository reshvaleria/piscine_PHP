<?php
    include ('sqlconnect.php');
    include ('pages/head.php');
    include ('pages/navigation.php');
    $user = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$_SESSION[id]'");
    $user = mysqli_fetch_assoc($user);
    if ($user['rights']==='admin') {
        echo "<p>Введите данные для изменения пользователя</p>
        <div class=\"save_user\">"
       . "<form action=\"admin_users_sql.php\" method=\"post\">"
       . "<input id=\"user_id\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"user_id\" placeholder=\"*Введите id изменяемого пользователя\" ><br />"
       . "<input id=\"login\" class=\"registration\" \" type=\"text\" name=\"new_login\" placeholder=\"* Введите новый логин\" ><br />"
       . "<input id=\"pass\" class=\"registration\" type=\"password\" size=\"20\" maxlength=\"32\" name=\"new_password\" placeholder=\"* Новый пароль\" /><br />"
       . "<input id=\"re_pass\" class=\"registration\" type=\"password\" size=\"20\" maxlength=\"32\" name=\"new_password2\" placeholder=\"*Повторите пароль\" ><br />"
       . "<input id=\"name\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"new_name\" placeholder=\"* Имя\" ><br />"
       . "<input id=\"lastname\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"new_lastname\" placeholder=\"* Фамилия\" ><br />"
       . "<input id=\"root\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"root\" placeholder=\"*Предоставить возможности суперпользователя? Y/N\" ><br />"
       . "<div>"
       . "<br><input type=\"submit\" class=\"button\" value=\"Изменить\"><br>"
       . "</div>"
       . "</form>"
       . "</div>";
       echo "<br><br><br><p>Введите данные для удаления пользователя</p>
       <div class=\"save_user\">"
      . "<form action=\"admin_delete_user.php\" method=\"post\">"
      . "<input id=\"user_id\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"user_id\" placeholder=\"*Введите id удаляемого пользователя\" ><br />"
      . "<div>"
      . "<br><input type=\"submit\" class=\"button\" value=\"Удалить\"><br>"
      . "</div>"
      . "</form>"
      . "</div>";
      echo "<br><br><p>Введите данные для создания нового пользователя</p>
      <div class=\"save_user\">"
     . "<form action=\"admin_create_user.php\" method=\"post\">"
     . "<input id=\"login\" class=\"registration\" \" type=\"text\" name=\"login\" placeholder=\"*Введите логин\" ><br />"
     . "<input id=\"pass\" class=\"registration\" type=\"password\" size=\"20\" maxlength=\"32\" name=\"password\" placeholder=\"*Введите пароль\" /><br />"
     . "<input id=\"re_pass\" class=\"registration\" type=\"password\" size=\"20\" maxlength=\"32\" name=\"password2\" placeholder=\"*Повторите пароль\" ><br />"
     . "<input id=\"name\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"name\" placeholder=\"*Имя\" ><br />"
     . "<input id=\"lastname\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"lastname\" placeholder=\"*Фамилия\" ><br />"
     . "<input id=\"root\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"root\" placeholder=\"*Предоставить возможности суперпользователя? Y/N\" ><br />"
     . "<div>"
     . "<br><input type=\"submit\" class=\"button\" value=\"Создать!\"><br>"
     . "</div>"
     . "</form>"
     . "</div>";
}
?>