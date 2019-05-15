<?php
    include ('sqlconnect.php');
    include ('pages/head.php');
    include ('pages/navigation.php');
    $id = $_POST['user_id'];
    $user = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$_SESSION[id]'");
    $user = mysqli_fetch_assoc($user);
    if ($id == $_SESSION['id']) {
        echo "<p>Нельзя удалить текущего юзера</p>
        <form action=\"user.php\" method=\"\">
        <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Личный кабинет\">
        </form>";
        echo "<form action=\"catalogue.php\" method=\"\">
        <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Вернуться к покупкам\">
        </form>";
        exit();
    }
    if ($user['rights']==='admin') {
        mysqli_query($mysqli, "DELETE FROM users WHERE id='$id'");
        echo "<p>Пользователь удален</p>
        <form action=\"user.php\" method=\"\">
        <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Личный кабинет\">
        </form>";
        echo "<form action=\"catalogue.php\" method=\"\">
        <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Вернуться к покупкам\">
        </form>";
    }
?>
