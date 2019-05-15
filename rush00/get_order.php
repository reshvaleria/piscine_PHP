<?php
    include ('sqlconnect.php');
    include ('pages/head.php');
    include ('pages/navigation.php');

    $order_status = 'Заказ принят';
    mysqli_query($mysqli,
    "INSERT INTO `orderstatus` (`id`, `user_id`, `ordersum`, `orderstatus`) VALUES
    (NULL, $_SESSION[id], $_SESSION[sum], 'Заказ принят')");
        $order_num = mysqli_query($mysqli, "SELECT `id` FROM `orderstatus` WHERE `user_id`=$_SESSION[id] ORDER BY id DESC LIMIT 1");
        $order_num = mysqli_fetch_assoc($order_num);
        $order_num = $order_num['id'];
        $phone = htmlspecialchars(stripslashes($_POST['phone_number']));
        $phone = trim($phone);
        $adr = htmlspecialchars(stripslashes($_POST['adress']));
        $adr = trim($adr);
        date_default_timezone_set('Europe/Moscow');
        $date = date('Y-m-d H:i');
        foreach ($_SESSION['basket'] as $row=>$item) {
            $item_id = mysqli_query($mysqli, "SELECT `name`, `price` FROM `articles` WHERE `id`=$row");
            $item_id = mysqli_fetch_assoc($item_id);
            $price = intval($item_id['price']);
            mysqli_query($mysqli,
                "INSERT INTO `orders` (`id`, `user_id`, `order_number`, `item_id`, 
                        `item_name`, `item_price`,`item_quantity`, `phone_number`, `adress`, `date`) 
                        VALUES (NULL, $_SESSION[id], '$order_num', '$row',
                        '$item_id[name]', '$price', '$item', '$phone', '$adr', '$date')");
        }
        if (!mysqli_errno($mysqli)) {
            echo "<p>Заказ принят!</p>";
            unset($_SESSION['basket']);
        }
        else
            echo "<p>Произошла ошибка!</p>";
        echo "<form action=\"index.php\" method=\"\">
                <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"На главную\">
                </form>";
        include ('pages/footer.php');
?>