<?php
include ("sqlconnect.php");
include ('pages/head.php');
include ('pages/navigation.php');

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    if ($name == '')
        unset($name);
}

if (isset($_POST['category'])) {
    $category=$_POST['category'];
    if ($category =='')
        unset($category);
}

if (isset($_POST['price'])) {
    $price=intval($_POST['price']);
    if ($price =='')
        unset($price);
}

if (isset($_POST['desc'])) {
    $desc = $_POST['desc'];
    if ($desc == '')
        unset($desc);
}

if (isset($_POST['brand'])) {
    $brand = $_POST['brand'];
    if ($brand == '') {
        unset($brand);
    }
}

if (isset($_POST['image'])) {
    $image = trim($_POST['image']);
    if ($image == '') {
        unset($image);
    }
}

if (empty($name) || empty($category) || empty($price) || empty($desc) || empty($brand) || empty($image)) {
    exit ("<p>Вы ввели некорректную информацию, вернитесь назад и заполните все поля!</p>"
        . "<a href=\"admin_products_change.php\" class=\"button\">Попробовать еще раз</a>");
}

$result = mysqli_query($mysqli, "SELECT `name` FROM `articles` WHERE `name`='$name'");
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['id'])) {
    exit ("Извините, введённое вами название используется. Введите другое название.");
}

$result2 = mysqli_query($mysqli, "INSERT INTO `articles` (`id`, `image`, `name`, `category`, `brand`, `price`, `description`) 
VALUES (NULL, '$image', '$name', '$category', '$brand', '$price', '$desc')");

if ($result2)
{
    echo "<p>
    Товар создан
    </p>";
}
else
    echo "<p>Ошибка! Товар не добавлен.</p>";

include ('pages/footer.php');
mysqli_close ($mysqli);
?>
