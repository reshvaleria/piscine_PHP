<?php
include ('sqlconnect.php');
include ('pages/head.php');
include ('pages/navigation.php');

$id = $_GET[id];
$product = mysqli_query($mysqli, "SELECT * FROM `articles`WHERE`id`=$id;");
$product = mysqli_fetch_assoc($product);
echo "<div class=\"product_full\">"
    . "<img src=\"$product[image]\" alt=\"\">"
    . "</div>"
    . "<div class=\"product_description\">"
    .  "<h3 class=\"product_name\">"
    . $product[name]
    . "</h3>"
    . "<p>"
    . $product[description]
    . "</p>"
    . "<p class=\"price\">"
    . $product[price]
    . " руб."
    . "</p>"
    . "<form action=\"add-to-cart.php\" method=\"GET\">"
    . "<input type=\"hidden\" name=\"item_id\"  value='$product[id]'>"
    . "<input type=\"number\" class=\"button\" size=\"3\" name=\"amount\" min=\"1\" max=\"100\" value=\"1\"><br>"
    . "<input class=\"button\" type=\"submit\"  name=\"add\" value=\"Положить в корзину\">"
    . "</form>"
    . "</div>";

include ('pages/footer.php');
mysqli_close ($mysqli);
?>
