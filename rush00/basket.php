<?php
session_start();
include ('pages/head.php');
include ('pages/navigation.php');
$mysqli = mysqli_connect('127.0.0.1', 'root', 'prometey12345', 'onlineshop');
function print_basket($mysqli) {
    echo "<h3>Корзина</h3>";
    if (isset($_SESSION['basket'])) {
        echo "<table class=\"table\">
           <tr>
                <td>Наименование</td>
                <td>Цена</td>
                <td>Количество</td>
            </tr>";
        $sum = 0;
            foreach($_SESSION['basket'] as $item_id => $amount) {
                $products = mysqli_query($mysqli, "SELECT `name`,`price` FROM `articles` WHERE `id`= $item_id;");
                $products = mysqli_fetch_assoc($products);
                $sum += $amount * $products['price'];
                echo "<tr>"
                . "<td>". $products['name']. "</td>"
                . "<td>". $products['price']. " руб.". "</td>"
                . "<td>" . $amount . "</td>"
                . "</tr>";
            }
            $_SESSION['sum'] = $sum;
            echo "<tr>"
            . "<td>Сумма:</td>"
            . "<td>". $sum. " руб.</td>"
            . "</tr></table>";
            echo "<form action=\"clear_basket.php\" method=\"GET\">"
            . "<input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Очистить корзину\">"
            . "</form>";
        } else {
            echo "<p>Ваша корзина пуста</p>"
            . "<form action=\"catalogue.php\" method=\"\">"
            . "<input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Вернуться к покупкам\">"
            . "</form>";
        }
    }
print_basket($mysqli);

if ((empty($_SESSION['login']) || empty($_SESSION['id'])) && (!empty($_SESSION['basket']))) {
    echo "<p>Чтобы оформить заказ необходимо войти или зарегистрироваться.</p>";
    echo "<a href=\"user.php?id=enter\" class=\"button\">Войти в аккаунт</a>";
} else {
    if (isset($_SESSION['basket'])) {
        echo "<h3>Оформить заказ</h3>
            <form action=\"get_order.php\" method=\"POST\">
            <div>
                <input type=\"text\" class=\"registration\"  name=\"phone_number\" size=\"20\" placeholder=\"Введите номер телефона\" style=\"height:40px; width:40%\" required>
            </div>
            <br>
            <div>
                <input type=\"text\" class=\"registration\"  name=\"adress\" placeholder=\"Введите адрес\" style=\"height:90px; width:40%\" required>
            </div>
            <br>
            <input type=\"submit\" class = \"button\" name=\"send_order\" value=\"Готово!\" style=\"height:50px; width:300px\">
            </form>";
    }
}
include ('pages/footer.php');
?>