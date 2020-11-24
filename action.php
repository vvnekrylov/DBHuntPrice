<?php
require_once 'connection.php';//подключаем скрипт

//подключаемся к серверу
$link = mysqli_connect($host, $user,$password, $database) or die ("Ошибка". mysqli_error($link));

//ВЫполняем операции с базой данныхЖ создаем таблицу
/*$query = "CREATE TABLE `host1323541_itstep24`.`HuntPrice` 
( 
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `name` VARCHAR NULL DEFAULT NULL ,
      `moose` INT NULL DEFAULT NULL ,
       `boar` INT NULL DEFAULT NULL ,
)";

$result = mysqli_query($link, $query) or die ("Ошибка". mysqli_error($link));

if ($result)
{
    echo "Создание таблицы прошло успешно";
}*/


//закрываем подключение
mysqli_close($link);


?>