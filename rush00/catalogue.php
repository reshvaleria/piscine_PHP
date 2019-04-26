<?php
session_start();
include('pages/head.php');
include('pages/navigation.php');
$user = 'root';
$password = 'root';
$host = 'localhost';
$port = 3306;
$db = 'onlineshop';
$articles = 'articles';
?>
<?php
function ft_get_items($items){
    $i = 0;
    while ($all_items[$i] = mysqli_fetch_assoc($items))
        $i++;
    return $all_items;
}

function ft_print_items($items)
{
    echo "<div class=\"products_section\"><ul class=\"products clearfix\">";
    foreach ($items as $v)
    {
        if($v[id])
            echo "<li class=\"product-wrapper\">"
                . "<a href=\"\" class=\"product\">"
                . "<div class=\"product-photo\">"
                . "<img src=\"img/YC/$v[id].jpg\" alt=\"\">"
                . "</div>"
                . "</a>"
                . "<p class=\"description\">"
                . $v[name]
                . "</p>"
                . "<p class=\"price\">"
                . $v[price]
                . " руб."
                . "</p>"
                . "<a href=\"#\" class=\"button\">Положить в корзину</a>"
                . "</li>"
            ;
    }
    echo "</ul></div>";
}
$mysqli = mysqli_connect($host, $user, $password, $db);
$category = 'all';
if ($category == 'all')
{
    echo "<h2>Все категории</h2>";
    $items = mysqli_query($mysqli,
        "SELECT * FROM `articles`");
}

elseif ($category == 'candles')
{
    echo "<h2>Свечи</h2>";

}
elseif ($category == 'diff')
{
    echo "<h2>Диффузоры</h2>";
    $items = mysqli_query($mysqli,
        "SELECT * FROM `articles` WHERE `category` = 'diff'");
}


$items = ft_get_items($items);
ft_print_items($items);
?>
<?php
include('pages/footer.php');
?>