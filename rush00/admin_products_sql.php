<?php
    include ('sqlconnect.php');
    include ('pages/head.php');
    include ('pages/navigation.php');
    $id = $_POST['product_id'];
    $user = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$_SESSION[id]'");
    $user = mysqli_fetch_assoc($user);
    if ($user['rights']==='admin') {
        $flaq = 0;
        if (!mysqli_query($mysqli, "SELECT `id` FROM `articles` WHERE `id`=$id")) {
            echo "<p>Не удалось обновить данные</p>
            <form action=\"user.php\" method=\"\">
            <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Личный кабинет\">
            </form>";
            exit;
        };
        if (isset($_POST['new_name'])) {
            $new_name = $_POST['new_name'];
            $result = mysqli_query($mysqli, "SELECT id FROM articles WHERE name='$new_name'");
            $myrow = mysqli_fetch_array($result);
            if (!empty($myrow['id'])) {
                    exit ("Извините, введённое вами имя уже зарегистрировано. Введите другое имя товара.");
                }
            if ($new_name === '')
                unset($new_name);
            else {
                $flaq = 1;
                mysqli_query($mysqli, "UPDATE articles SET name='$new_name' WHERE id='$id'");
            }
        }

        if (isset($_POST['new_category'])) {
            $new_category = $_POST['new_category'];
            if ($new_category === '' && $new_category !== 'candles' && $new_category !== 'diff')
                unset($new_category);
                else {
                    $flaq = 1;
                    mysqli_query($mysqli, "UPDATE articles SET category='$new_category' WHERE id='$id'");
                }
        }
        
        if (isset($_POST['new_price'])){
            $new_price = intval($_POST['new_price']);
            if ($new_price === '')
                unset($new_price);
            else {
                mysqli_query($mysqli, "UPDATE articles SET price='$new_price' WHERE id='$id'");
                $flaq = 1;
            }
        }
        
        if (isset($_POST['new_desc'])) {
            $new_desc = $_POST['new_desc'];
            if ($new_desc === '')
                unset($new_desc);
            else {
                mysqli_query($mysqli, "UPDATE articles SET description='$new_desc' WHERE id='$id'");
                $flaq = 1;
            }
        }
         if (isset($_POST['new_brand'])) {
             $new_brand = $_POST['new_brand'];
             $new_brand = trim($new_brand);
             if ($new_brand === '')
                 unset($new_brand);
             else {
                 mysqli_query($mysqli, "UPDATE articles SET brand='$new_brand' WHERE id='$id'");
                 $flaq = 1;
             }
        }

        if (isset($_POST['new_image'])) {
            $new_image = $_POST['new_image'];
            $new_image = trim($new_image);
            if ($new_image === '')
                unset($new_image);
            else {
                mysqli_query($mysqli, "UPDATE articles SET image='$new_image' WHERE id='$id'");
                $flaq = 1;
            }
        }

        if ($flaq) {
            echo "<p>Данные успешно обновлены!</p>
            <form action=\"user.php\" method=\"\">
            <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Личный кабинет\">
            </form>";
            echo "<form action=\"catalogue.php\" method=\"\">
            <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Вернуться к покупкам\">
            </form>";
        } else {
            echo "<p>Не удалось обновить данные</p>
            <form action=\"user.php\" method=\"\">
            <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Личный кабинет\">
            </form>";
            echo "<form action=\"catalogue.php\" method=\"\">
            <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Вернуться к покупкам\">
            </form>";
        }
    }
    include ('pages/footer.php');
?>