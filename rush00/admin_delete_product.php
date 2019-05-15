<?php
    include ('sqlconnect.php');
    include ('pages/head.php');
    include ('pages/navigation.php');
    $id = $_POST['product_id'];
    $user = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$_SESSION[id]'");
    $user = mysqli_fetch_assoc($user);
    if ($user['rights']==='admin') {
        mysqli_query($mysqli, "DELETE FROM articles WHERE id='$id'");
        echo "<p>Товар удален</p>
        <form action=\"user.php\" method=\"\">
        <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Личный кабинет\">
        </form>";
        echo "<form action=\"catalogue.php\" method=\"\">
        <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Вернуться к покупкам\">
        </form>";
    }
?>
