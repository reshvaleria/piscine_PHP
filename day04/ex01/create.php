<?php
if ($_POST['submit'] && $_POST['submit'] === 'OK') {
    if ($_POST['login'] && $_POST['passwd']) {
        if (!file_exists('../private/'))
            mkdir('../private/');
        if (!file_exists('../private/passwd')) {
            file_put_contents('../private/passwd', "");
        }
        $tmp = unserialize(file_get_contents('../private/passwd'));
        if ($tmp) {
            $res = 0;
            foreach ($tmp as $k=>$v)
                if ($v['login'] === $_POST['login']) {
                    $res = 1;
                    break;
                }
        }
        if (!$res) {
            $tmp[] = array('login'=>$_POST['login'], 'passwd'=>hash('whirlpool', $_POST['passwd']));
            file_put_contents('../private/passwd', serialize($tmp));
            echo "OK\n";
        } else
            echo "ERROR\n";
    } else
        echo "ERROR\n";
} else
    echo "ERROR\n";
?>