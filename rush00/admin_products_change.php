<?php
    include ('sqlconnect.php');
    include ('pages/head.php');
    include ('pages/navigation.php');
    $user = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$_SESSION[id]'");
    $user = mysqli_fetch_assoc($user);
    if ($user['rights']==='admin') {
        echo "<p>Введите данные для изменения</p>
        <div class=\"save_user\">"
       . "<form action=\"admin_products_sql.php\" method=\"post\">"
       . "<input id=\"product_id\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"product_id\" placeholder=\"*Введите id изменяемого товара\" ><br />"
       . "<input id=\"new_name\" class=\"registration\" type=\"text\" name=\"new_name\" placeholder=\"*Введите новое имя товара\" ><br />"
       . "<input id=\"new_category\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"32\" name=\"new_category\" placeholder=\"*Новая категория(candles/diff)\" /><br />"
       . "<input id=\"new_price\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"32\" name=\"new_price\" placeholder=\"*Новая цена\" ><br />"
       . "<input id=\"new_desc\" class=\"registration\" type=\"text\" name=\"new_desc\" placeholder=\"*Новое описание\" ><br />"
       . "<input id=\"new_brand\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"new_brand\" placeholder=\"*Новый бренд(Yankee/Paddy)\" ><br />"
            . "<input id=\"new_image\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"255\" name=\"new_image\" placeholder=\"*Ссылка на изображение\" ><br />"
            . "<div>"
       . "<br><input type=\"submit\" class=\"button\" value=\"Изменить\"><br>"
       . "</div>"
       . "</form>"
       . "</div>";
       echo "<br><br><br><p>Введите данные для удаления</p>
       <div class=\"save_user\">"
      . "<form action=\"admin_delete_product.php\" method=\"post\">"
      . "<input id=\"product_id\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"product_id\" placeholder=\"*Введите id удаляемого товара\" ><br />"
      . "<div>"
      . "<br><input type=\"submit\" class=\"button\" value=\"Удалить\"><br>"
      . "</div>"
      . "</form>"
      . "</div>";
        echo "<p>Введите данные для создания товара</p>
        <div class=\"save_user\">"
            . "<form action=\"admin_create_product.php\" method=\"post\">"
            . "<input id=\"name\" class=\"registration\" type=\"text\" name=\"name\" placeholder=\"*Введите новое имя товара\" ><br />"
            . "<input id=\"category\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"32\" name=\"category\" placeholder=\"*Новая категория(candles/diff)\" /><br />"
            . "<input id=\"price\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"32\" name=\"price\" placeholder=\"*Новая цена\" ><br />"
            . "<input id=\"desc\" class=\"registration\" type=\"text\" name=\"desc\" placeholder=\"*Новое описание\" ><br />"
            . "<input id=\"brand\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"30\" name=\"brand\" placeholder=\"*Новый бренд(Yankee/Paddy)\" ><br />"
            . "<input id=\"image\" class=\"registration\" type=\"text\" size=\"20\" maxlength=\"255\" name=\"image\" placeholder=\"*Ссылка на изображение\" ><br />"
            . "<div>"
            . "<br><input type=\"submit\" class=\"button\" value=\"Создать\"><br>"
            . "</div>"
            . "</form>";
}
?>