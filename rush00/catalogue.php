<?php
include ('sqlconnect.php');
include ('pages/head.php');
include ('pages/navigation.php');

function ft_get_items($items){
    $i = 0;
    while ($all_items[$i] = mysqli_fetch_assoc($items))
        $i++;
    return $all_items;
}

function ft_print_items($items)
{
    echo "<div class=\"products_section\"><ul class=\"products clearfix\">";
    foreach ($items as $product)
    {
        if ($product['id'])
            echo "<li class=\"product-wrapper\">"
                . "<a href=\"/product.php?id=$product[id]\" class=\"product\">"
                . "<div class=\"product-photo\">"
                . "<img src=\"$product[image]\" alt=\"\">"
                . "</div>"
                . "</a>"
                . "<p class=\"description\">"
                . $product['name']
                . "</p>"
                . "<p class=\"price\">"
                . $product['price']
                . " руб."
                . "</p>"
                . "<form action=\"add-to-cart.php\" method=\"GET\">"
                . "<input type=\"hidden\" name=\"item_id\"  value='$product[id]'>"
                . "<input type=\"number\" class=\"button\" size=\"3\" name=\"amount\" min=\"1\" max=\"100\" value=\"1\">"
                . "<input class=\"button\" type=\"submit\"  name=\"add\" value=\"Положить в корзину\">"
                . "</form>"
                . "</li>"
            ;
    }
    echo "</ul></div>";
}
$category = $_GET['id'];
if ($category == 'all' || !$category) {
    echo "<h2>Все категории и бренды</h2>";
    $items = mysqli_query($mysqli,
        "SELECT * FROM `articles`");
}
elseif ($category == 'candles') {
    echo "<h2>Свечи</h2>";
    $items = mysqli_query($mysqli,
        "SELECT * FROM `articles` WHERE `category` = 'candles'");
}
elseif ($category == 'diff') {
    echo "<h2>Диффузоры</h2>";
    $items = mysqli_query($mysqli,
        "SELECT * FROM `articles` WHERE `category` = 'diff'");
}
elseif ($category == 'Yankee') {
    echo "<h2>Yankee Candle</h2>";
    $items = mysqli_query($mysqli,
        "SELECT * FROM `articles` WHERE `brand` = 'Yankee'");
}
elseif ($category == 'Paddy') {
    echo "<h2>PaddyWax</h2>";
    $items = mysqli_query($mysqli,
        "SELECT * FROM `articles` WHERE `brand` = 'Paddy'");
}
$items = ft_get_items($items);
ft_print_items($items);

include ('pages/footer.php');
mysqli_close ($mysqli);
?>