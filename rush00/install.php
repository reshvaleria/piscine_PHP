<?php
session_start();
$user = 'root';
$password = 'prometey12345';
$host = '127.0.0.1';
$port = 3306;
$db = 'onlineshop';
$articles = 'articles';
$mysqli = @mysqli_connect($host, $user, $password);
if (mysqli_connect_errno($mysqli)) {
    echo  "<h3>Ошибка</h3>"
        . "<p>Не удалось подключиться к MySQL: " . mysqli_connect_error() . "</p>";
    exit;
}

mysqli_query($mysqli, "DROP DATABASE $db");
mysqli_query($mysqli, "CREATE DATABASE $db");
mysqli_select_db ($mysqli, $db);

mysqli_query($mysqli,
    "CREATE TABLE $articles
( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`image` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`category` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`brand` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`price` INT UNSIGNED NOT NULL ,
`description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`), UNIQUE (`name`)) ENGINE = InnoDB;");

mysqli_query($mysqli,
    "INSERT INTO `articles` (`id`, `image`, `name`, `category`, `brand`, `price`, `description`) VALUES
(NULL, 'https://static.tildacdn.com/tild6166-3233-4139-a531-313566333062/__.JPG', 'Ароматическая свеча <b>Yankee Candle</b><br>Кокосовый всплеск<br>Coconut Splash', 'candles', 'Yankee', 1990, 'Освежающий и чистый аромат спелых кокосов, с естественной тропической сладостью. \r\n\r\n\n    Верхние ноты: Дыня, Кокосовая Вода, Манго \r\nСредние ноты: Кокос, Кокосовое Молоко \r\n\n    Базовые ноты: Ваниль, Сандаловое Дерево \r\n\r\nТип аромата: фруктовый \r\nЦвет: белый.\r\n\r\n\n    Состав: высокоочищенный парафин, натуральные ароматические масла, стекло. \r\n\r\nСделано в Чехии. '),
(NULL, 'https://static.tildacdn.com/tild3761-3866-4039-a533-343535323139/_.JPG', 'Ароматическая свеча <b>Yankee Candle</b><br>Белое какао со специями<br>\n    Spiced white cocoa', 'candles', 'Yankee', 1990, 'Теплое и восхитительное какао с мускатным орехом, покрытое слоем взбитых сливок. \r\n\r\n\n    Верхние ноты: Белое Какао \r\n\n    Средние ноты: Соленая Карамель, Сладкий Крем, Мускатный Орех \r\n\n    Базовые ноты: Ириски \r\n\r\n\n    Тип аромата: праздничный \r\nЦвет: белый \r\n\r\n\n    Состав: высокоочищенный парафин, натуральные ароматические масла, стекло. \r\n\r\nСделано в США/Чехия. '),
(NULL, 'https://static.tildacdn.com/tild6239-6132-4365-b337-393630316263/_.JPG', 'Ароматическая свеча <b>Yankee Candle</b><br>Лаванда<br>Lavender', 'candles', 'Yankee',1990, 'Роскошный и одновременно успокаивающий букет лаванды с вереском \r\n\r\n\n    Верхние ноты: Озон, Эвкалипт, Шалфей \r\n\n    Средние ноты: Розмарин, свежая Лаванда, Тимьян \r\n\n    Базовые ноты: Ветивер, Кедр, Мох \r\n\r\n\n    Тип аромата: цветочный \r\nЦвет: сиреневый \r\n\r\n\n    Состав: высокоочищенный парафин, натуральные ароматические масла, стекло. \r\n\r\n\n    Сделано в США. '),
(NULL, 'https://static.tildacdn.com/tild3836-6161-4962-b738-343661303030/_.JPG', 'Ароматическая свеча <b>Yankee Candle</b><br>Розовые пески<br>Pink Sands', 'candles', 'Yankee', 1990, 'Уединение на экзотическом острове в окружении ярких цитрусовых нот, сладких цветов и пряной ванили.\r\n\r\n\n    Верхние ноты: Цитрусовые, Дыня, Ягоды\r\n\n    Средние ноты: Османтус\r\n\n    Базовые ноты: Пряная Ваниль, Мускус, Древесные Ноты\r\n\r\n\n    Тип аромата: свежий\r\nЦвет: розовый\r\n\r\n\n    Состав: высокоочищенный парафин, натуральные ароматические масла, стекло.\r\n\r\n\n    Сделано в США.'),
(NULL, 'https://static.tildacdn.com/tild3532-6430-4035-b033-616661616337/_1.JPG', 'Ароматический диффузор <b>Yankee Candle</b><br>Лимон и лаванда<br>Lemon lavender', 'diff', 'Yankee', 2150, 'Освежающий аромат лимона и сладких цветов лаванды. \r\n\r\nВерхние ноты: Мандарин, Лимон, Лаванда \r\nСредние ноты: Фруктовые Ноты, Апельсин, Петигрейн, Эвкалипт \r\nБазовые ноты: Ваниль, Оттенки Специй \r\n\r\nТип аромата: свежий \r\nЦвет: разноцветный, флакон частично расписан вручную \r\n\r\nВремя использования: наполняет ароматом помещение 40 метров более 1,5 месяца при постоянном использовании. \r\nОбъем: 88,9 мл. \r\n\r\nСделано в США/Чехии. '),
(NULL, 'https://static.tildacdn.com/tild3265-3661-4739-b333-333866333135/_1.JPG', 'Ароматический диффузор <b>Yankee Candle</b><br>Душистый горошек<br>Garden sweet pea', 'diff', 'Yankee', 2150, 'Сладкий аромат нежных цветков душистого горошка с оттенками груши, персика, фрезии и розового дерева. \r\n\r\nВерхние ноты: Душистый Горошек, Груша, Белый Персик \r\nСредние ноты: Фрезия, Озоновый Туман \r\nБазовые ноты: Палисандр, Ваниль, Мускус \r\n\r\nТип аромата: цветочный \r\nЦвет: разноцветный, флакон частично расписан вручную \r\n\r\nВремя использования: наполняет ароматом помещение 40 метров более 1,5 месяца при постоянном использовании. \r\nОбъем: 88,9 мл. \r\n\r\nСделано в США.'),
(NULL, 'https://static.tildacdn.com/tild3638-3864-4434-b637-383536363133/IMG_0322.JPG', 'Ароматическая свеча <b>PADDYWAX</b><br>John Steinbeck', 'candles', 'Paddy', 2900, 'Лауреат Нобелевской премии, американец Джон Стейнбек – тонкий психолог и масштабный писатель. В своих романах «Гроздья гнева», «Зима тревоги нашей», «О мышах и людях» он поднимает извечные темы: добра и зла, униженных и оскорбленных, правых и виноватых.<br><br>Аромат свечи, посвященной писателю, просто не может пахнут ничем другим, кроме амбры и тлеющей древесины березы. Глубокий и располагающий к размышлению, этот аромат станет вашим лучшим другом уютными вечерами.<br>Основные ноты: тлеющая береза, амбра, дым.<br>Тип аромата: древесный.<br><br>Состав: натуральный соевый воск, аромамасла, стекло. <br>Время использования: 50 часов. <br>Вес: 185 г <br><br>Сделано в США.'),
(NULL, 'https://static.tildacdn.com/tild3533-3734-4662-b661-616238316138/Alcott.jpg', 'Ароматическая свеча <b>PADDYWAX</b><br>Louisa May Alcott', 'candles', 'Paddy', 2900, 'Луиза Мэй Олкотт — американская писательница 19 века. По просьбе бостонского издателя написать «книгу для девочек» Луиза создала свой самый известный роман «Маленькие женщины». Позднее Олкотт стала активным борцом за права женщин и была первой женщиной, которая приняла участие в выборах в штате Массачусетс.<br><br>Аромат, посвященный писательнице, такой же сложный и многогранный. Он соединяет в себе женственные ноты жасмина, цветов вишни и лепестки роз вместе с диким травяным ароматом папоротника.<br>Основные ноты: цветы вишни, лепестки розы, жасмин, плющ.<br>Тип аромата: цветочный.<br><br>Состав: натуральный соевый воск, аромамасла, стекло. <br>Время использования: 50 часов. <br>Вес: 185 г <br><br>Сделано в США.'),
(NULL, 'https://static.tildacdn.com/tild3764-3566-4436-b762-373261366639/RELISH_SMOKED_WOOD_3.jpg', 'Ароматическая свеча <b>PADDYWAX</b><br>Дымное дерево и амбра<br>Smoked wood & amber', 'candles', 'Paddy', 1600, 'Глубокий, чувственный и благородный. Аромат пылающего камина, тонкая нотка амбры и терпкость дыма: к этому запаху вам будет просто необходим бокал красного вина!<br><br>Похоже, вас ждет роскошное завершение дня.<br>Основные ноты: сгоревшее дерево, амбра.<br>Тип аромата: пряный.<br><br>Состав: натуральный соевый воск, аромамасла, стекло. <br>Время использования: 25 часов. <br>Вес: 85 г <br><br>Сделано в США.'),
(NULL, 'https://static.tildacdn.com/tild3433-6437-4931-b932-306634333036/Relish_OceanSeaSalt_.jpg', 'Ароматическая свеча <b>PADDYWAX</b><br>Прилив океана и морская соль<br>Ocean tide & sea salt', 'candles', 'Paddy', 1600, 'Соленое море и шепот волн, — закройте глаза, и вам даже не нужно будет ничего представлять! Аромат нашей свечи OCEAN TIDE & SEA SALT все сделает за вас.<br><br>Запах соленых брызг: что может быть прекрасней для ванной? <br>Основные ноты: морская соль.<br>Тип аромата: свежий.<br><br>Состав: натуральный соевый воск, аромамасла, стекло. <br>Время использования: 25 часов. <br>Вес: 85 г <br><br>Сделано в США.'),
(NULL, 'https://static.tildacdn.com/tild3565-6633-4435-a137-646435613330/PWAX-RELISH-SALTEDGR.jpg', 'Ароматическая свеча <b>PADDYWAX</b><br>Соленый грейпфрут<br>Salted grapefruit', 'candles', 'Paddy', 1600, 'Грейпфрут и морская соль – почему бы и нет? Свежий и жизнерадостный аромат свечи SALTED GRAPEFRUIT поднимет настроение и утром, и вечером. И это не удивительно, ведь эфирное масло грейпфрута – отличный антидепрессант.<br><br>Зажгите ее и насладитесь моментом! <br>Основные ноты: соленый грейпфрут.<br>Тип аромата: свежий.<br><br>Состав: натуральный соевый воск, аромамасла, стекло. <br>Время использования: 25 часов. <br>Вес: 85 г <br><br>Сделано в США.');
");
mysqli_query($mysqli,
    "
CREATE TABLE `onlineshop`.`users` 
( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , 
`login` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
`password` VARCHAR(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
`rights` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
`firstname` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
`lastname` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
PRIMARY KEY (`id`), UNIQUE (`login`)) ENGINE = InnoDB;");
$tmp = hash('whirlpool','qwerty');
mysqli_query($mysqli,
    "INSERT INTO `users` (`id`, `login`, `password`, `rights`, `firstname`, `lastname`) 
VALUES (NULL, 'reshvaleria', '$tmp', 'admin', 'Валерия', 'Решетникова'), 
       (NULL, 'user', '$tmp', 'user', 'Юзер', 'Юзеров')");

mysqli_query($mysqli, "CREATE TABLE `onlineshop`.`orders` 
( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , 
`user_id` INT(11) UNSIGNED NOT NULL,
`order_number` INT(11) UNSIGNED NOT NULL , 
`item_id` INT(11) UNSIGNED NOT NULL , 
`item_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
`item_price` INT(11) UNSIGNED NOT NULL , 
`item_quantity` INT(11) UNSIGNED NOT NULL , 
`phone_number` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`adress` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`date` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (`id`)) ENGINE = InnoDB;");

mysqli_query($mysqli, "CREATE TABLE `onlineshop`.`orderstatus` 
( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , 
`user_id` INT(11) UNSIGNED NOT NULL , 
`ordersum` INT(11) UNSIGNED NOT NULL , 
`orderstatus` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;");

mysqli_close ($mysqli);
header('Location: index.php');
?>