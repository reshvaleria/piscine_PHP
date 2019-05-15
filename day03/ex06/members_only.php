<?php
if ($_SERVER['PHP_AUTH_USER'] === 'zaz' && $_SERVER['PHP_AUTH_PW'] === 'jaimelespetitsponeys') {
    $file = file_get_contents('../img/42.png');
    echo "<html><body>";
    echo "\n";
    echo "Hello Zaz<br />";
    echo "\n";
    echo "<img src='data:image/png;base64,"
        . base64_encode($file)
        . "'>";
    echo "\n";
    echo "</body></html>";
    echo "\n";
} else {
    header("WWW-Authenticate: Basic realm=''Member area''");
    header("HTTP/1.0 401 Unauthorized");
    echo "<html><body>That area is accessible for members only</body></html>" . "\n";
}
?>