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
    echo "<div><ul class=\"products clearfix\">";
    foreach ($items as $v)
    {
        if($v[id])
            echo "<li class=\"product-wrapper\">"
                . "<a href=\"\" class=\"product\">"
                . "<figure>"
                . "<div class=\"product-photo\">"
                . "<img src=\"img/YC/1.jpg\" alt=\"\">"
//                . "</div>"
//                . "</a>"
                . "<figcaption>"
                . "<p>"
                . $v[name]
                . " costs "
                . $v[price]
                . " rubles"
                . "</p>"
                . "</figcaption>"
                . "</div>"
                . "</figure>"
                . "</a>"
                . "</li>"
            ;

    }
    echo "</ul></div>";
}
$category = 'candles';
if ($category == 'all')
    echo "<h2>Все категории</h2>";
elseif ($category == 'candles')
    echo "<h2>Свечи</h2>";
elseif ($category == 'diff')
    echo "<h2>Диффузоры</h2>";
$mysqli = mysqli_connect($host, $user, $password, $db);
$items = mysqli_query($mysqli,
    "SELECT * FROM `articles` WHERE `category` = 'candles'");
$items = ft_get_items($items);
ft_print_items($items);
?>
<?php
include('pages/footer.php');
?>