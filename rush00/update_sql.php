<?php
    include ('sqlconnect.php');
    include ('pages/head.php');
    include ('pages/navigation.php');
    $id = $_SESSION['id'];
    $flaq = 0;
    if (isset($_POST['new_login'])) {
        $new_login = $_POST['new_login'];
        if ($new_login == '')
            unset($new_login);
        else {
            $flaq = 1;
            mysqli_query($mysqli, "UPDATE users SET login='$new_login' WHERE id='$id'");
        }
    }
    
    if (isset($_POST['new_password'])) {
        $new_password = $_POST['new_password'];
        if ($new_password == '')
            unset($new_password);
    }
    
    if (isset($_POST['new_password2'])){
        if (!($_POST['new_password2'] === $new_password))
            unset($new_password);
        else {
            $new_password = hash('whirlpool', $_POST['new_password2']);
            mysqli_query($mysqli, "UPDATE users SET password='$new_password' WHERE id='$id'");
            $flaq = 1;
        }
    }
    
    if (isset($_POST['new_name'])) {
        $new_name = $_POST['new_name'];
        if ($new_name == '')
            unset($new_name);
        else {
             mysqli_query($mysqli, "UPDATE users SET firstname='$new_name' WHERE id='$id'");
             $flaq = 1;
        }
    }
    
    if (isset($_POST['new_lastname'])) {
        $new_lastname = $_POST['new_lastname'];
        if ($new_lastname == '') 
            unset($new_lastname);
        else {
             mysqli_query($mysqli, "UPDATE users SET lastname='$new_lastname' WHERE id='$id'");
             $flaq = 1;
        }
    }
    if ($flaq)
    {
        echo "<p>Данные успешно обновлены!</p>
        <form action=\"user.php\" method=\"\">
        <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Личный кабинет\">
        </form>";
        echo "<form action=\"catalogue.php\" method=\"\">
        <input type=\"submit\" class = \"button\"  name=\"clear_basket\" value=\"Вернуться к покупкам\">
        </form>";
    }
    include ('pages/footer.php');
?>