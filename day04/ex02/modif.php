<?php
if ($_POST['submit'] && $_POST['submit'] === 'OK') {
    if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw']) {
        $tmp = unserialize(file_get_contents('../private/passwd'));
        $res = 0;
        if ($tmp) {
            foreach ($tmp as $k=>$v)
                if ($v['login'] === $_POST['login'] && $v['passwd'] === hash('whirlpool', $_POST['oldpw'])) {
                    $tmp[$k]['passwd'] = hash('whirlpool', $_POST['newpw']);
                    file_put_contents('../private/passwd', serialize($tmp));
                    echo "OK\n";
                    $res = 1;
                    break;
                }
        }
        if (!$res)
            echo "ERROR\n";
    } else
        echo "ERROR\n";
} else
    echo "ERROR\n";
?>