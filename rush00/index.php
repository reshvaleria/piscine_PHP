<?php
session_start();
$num = (isset($_SESSION["num"])) ? $_SESSION["num"] : 0;
if (!$num)
    include('install.php');//удалить это
echo $num;
$num++;
$_SESSION["num"] = $num;

include('pages/head.php');
include('pages/navigation.php');
?>

<header class="main-header" id="top">
     <span class="title">Ароматы для дома</span>
         <h1>Smell of Happiness</h1>
    <img class="header_image" src="img/yankeecandle8.jpg" alt="Yankee Candle">
</header>
<ul class="main">
    <li>dfghjkl
    </li>
    <li>cfghj</li>
</ul>
<?php
include('pages/footer.php');
//session_destroy(); //УДАЛИТЬ ЭТО
?>