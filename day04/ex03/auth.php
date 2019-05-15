<?php
function auth($login, $passwd) {
    $acc = unserialize(file_get_contents("../private/passwd"));
    if (!$acc)
        return(false);
    $passwd = hash('whirlpool', $passwd);
    foreach ($acc as $k => $v) {
        if ($v["login"] === $login && $v["passwd"] === $passwd)
            return (true);
    }
    return(false);
}
?>