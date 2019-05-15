<?php
include ('functions.php');
if ($user['rights']==='admin') {
    $users = mysqli_query($mysqli, "SELECT * FROM `users` ");
    $users = get_data($users);
    $orders = mysqli_query($mysqli, "SELECT * FROM `orders` ");
    $orders = get_data($orders);
    $items = mysqli_query($mysqli, "SELECT * FROM `articles` ");
    $items = get_data($items);
    $action = ['users',
        'orders',
        'articles'];
    $written = ['Информация о пользователях',
        'Информация о заказах',
        'Информация о товарах'];
    for ($i = 0; $i < count($action); $i++)
        admin_actions($action[$i], $written[$i]);
    if ($_POST['users'] || $_POST['orders'] || $_POST['articles']) {
        if ($_POST['users']) {
            $content = $users;
            echo "<h2>Управление учетными записями</h2>
            <div><form action=\"admin_users_change.php\" method=\"post\">
            <input type=\"submit\" class=\"button\" value=\"Изменить данные\"><br>
            </form></div>";
        }
        if ($_POST['orders']) {
            $content = $orders;
        }
        if ($_POST['articles']) {
            $content = $items;
            echo "<h2>Управление товарами</h2>
            <div><form action=\"admin_products_change.php\" method=\"post\">
            <input type=\"submit\" class=\"button\" value=\"Изменить данные\"><br>
            </form></div>";
        }
        print_table_header($content);
        print_table_content($content);
        echo "</table>";
    }
}
?>