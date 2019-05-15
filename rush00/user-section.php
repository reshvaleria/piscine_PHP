<?php
require('functions.php');
if ($user['rights']==='user') {
$user_id = $_SESSION[id];
$content = mysqli_query($mysqli, "SELECT * FROM `orders` WHERE user_id='$user_id'");
    echo "<div>";
    echo "<h2>Мои заказы</h2>";
    $content = get_data($content);
        print_table_header_user($content);
    print_table_content_user($content);
    echo "</div>";
    echo "<div><h2>Управление учетной записью</h2>
    <form action=\"user_change.php\" method=\"post\">
    <input id=\"pass\" type=\"password\" class=\"registration\" name=\"password\" placeholder=\"Введите пароль\" required> <br><br>
    <input type=\"submit\" class=\"button\" value=\"Изменить данные\"><br>
    </form></div>";
}
?>