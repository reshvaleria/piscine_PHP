<?php
session_start();
$user = 'root';
$password = 'root';
$host = 'localhost';
$port = 3306;
$db = 'onlineshop';
$articles = 'articles';
$mysqli = mysqli_connect($host, $user, $password);
if (mysqli_connect_errno($mysqli)) {
    echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
}

/* Создаем базу данных магазина и выбираем ее */
mysqli_query($mysqli, "DROP DATABASE $db");
mysqli_query($mysqli, "CREATE DATABASE $db");
mysqli_select_db ($mysqli, $db);

/* Создаем таблицу с товарами */

mysqli_query($mysqli,
    "CREATE TABLE $articles
( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`category` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`price` INT UNSIGNED NOT NULL ,
`description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`), UNIQUE (`name`)) ENGINE = InnoDB;");

/* Добавляем товары */

mysqli_query($mysqli,
    "INSERT INTO `articles`
    (`id`, `name`, `category`, `price`, `description`)
    VALUES (NULL, 'Ароматическая свеча\r\nYankee Candle\r\nКокосовый всплеск/ \r\nCoconut Splash', 'candles',
    '1990',
    'Освежающий и чистый аромат спелых кокосов, с естественной тропической сладостью. \r\n\r\n
    Верхние ноты: Дыня, Кокосовая Вода, Манго \r\nСредние ноты: Кокос, Кокосовое Молоко \r\n
    Базовые ноты: Ваниль, Сандаловое Дерево \r\n\r\nТип аромата: фруктовый \r\nЦвет: белый.\r\n\r\n
    Состав: высокоочищенный парафин, натуральные ароматические масла, стекло. \r\n\r\nСделано в Чехии. ')");


mysqli_query($mysqli,
    "INSERT INTO `articles`
    (`id`, `name`, `category`, `price`, `description`)
    VALUES (NULL, 'Ароматическая свеча\r\nYankee Candle\r\nКокосовый всплеск/ \r\nCoconut Splash1', 'candles',
    '1990',
    'Освежающий и чистый аромат спелых кокосов, с естественной тропической сладостью. \r\n\r\n
    Верхние ноты: Дыня, Кокосовая Вода, Манго \r\nСредние ноты: Кокос, Кокосовое Молоко \r\n
    Базовые ноты: Ваниль, Сандаловое Дерево \r\n\r\nТип аромата: фруктовый \r\nЦвет: белый.\r\n\r\n
    Состав: высокоочищенный парафин, натуральные ароматические масла, стекло. \r\n\r\nСделано в Чехии. ')");


mysqli_query($mysqli,
    "INSERT INTO `articles`
    (`id`, `name`, `category`, `price`, `description`)
    VALUES (NULL, 'Ароматическая свеча\r\nYankee Candle\r\nКокосовый всплеск/ \r\nCoconut Splash2', 'candles',
    '1990',
    'Освежающий и чистый аромат спелых кокосов, с естественной тропической сладостью. \r\n\r\n
    Верхние ноты: Дыня, Кокосовая Вода, Манго \r\nСредние ноты: Кокос, Кокосовое Молоко \r\n
    Базовые ноты: Ваниль, Сандаловое Дерево \r\n\r\nТип аромата: фруктовый \r\nЦвет: белый.\r\n\r\n
    Состав: высокоочищенный парафин, натуральные ароматические масла, стекло. \r\n\r\nСделано в Чехии. ')");


mysqli_query($mysqli,
    "INSERT INTO `articles`
    (`id`, `name`, `category`, `price`, `description`)
    VALUES (NULL, 'Ароматическая свеча\r\nYankee Candle\r\nКокосовый всплеск/ \r\nCoconut Splash5', 'candles',
    '1990',
    'Освежающий и чистый аромат спелых кокосов, с естественной тропической сладостью. \r\n\r\n
    Верхние ноты: Дыня, Кокосовая Вода, Манго \r\nСредние ноты: Кокос, Кокосовое Молоко \r\n
    Базовые ноты: Ваниль, Сандаловое Дерево \r\n\r\nТип аромата: фруктовый \r\nЦвет: белый.\r\n\r\n
    Состав: высокоочищенный парафин, натуральные ароматические масла, стекло. \r\n\r\nСделано в Чехии. ')");



mysqli_close ($mysqli);

?>