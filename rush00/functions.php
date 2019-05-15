<?php

function get_data($get)
{
    $i = 0;
    while ($all[$i] = mysqli_fetch_assoc($get))
        $i++;
    return $all;
}

function admin_actions($action, $written) {
    echo "<form action=\"\" method=\"POST\">
        <input type=\"submit\" class=\"button\" style=\"width: 25%;\" name=\"$action\" value=\"$written\"><br>
        </form>";
}

function print_table_header_user($content){
    if (!$content[0]) {
        echo "<p>Информация отсутствует.</p>";
        return ;
    }
    echo "<table class=\"database\">";
    $tmp = $content[0];
    echo "<tr>";
    foreach ($tmp as $k => $v) {
        if ($k !== 'id' && $k !== 'user_id' && $k !== 'item_id') {
            echo "<th>". $k . "</th>";
        }
    }
    echo "</tr>";
}

function print_table_content_user ($content){
    if (!$content)
        return;
    foreach ($content as $user_row)
    {
        echo "<tr>";
        if ($user_row) {
            foreach ($user_row as $k => $u){
                if ($k !== 'id' && $k !== 'user_id' && $k !== 'item_id') {
                    echo "<td>". $u . "</td>";
                }
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

function print_table_header($content){
    if (!$content[0]) {
        echo "<p>Информация отсутствует.</p>";
        return ;
    }
    echo "<table class=\"database\">";
        $tmp = $content[0];
        echo "<tr>";
        foreach ($tmp as $k => $v) {
            if ($k !== 'password') {
                echo "<th>". $k . "</th>";
            }
        }
        echo "</tr>";
}

function print_table_content ($content){
    foreach ($content as $user_row)
    {
        echo "<tr>";
        if ($user_row) {
            foreach ($user_row as $k => $u){
                if ($k !== 'password') {
                echo "<td>". $u . "</td>";
                }
            }   
        }
        echo "</tr>";
    }
    echo "</table>";
}

?>