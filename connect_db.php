<?php
    try {
        $pdo = new PDO ('mysql:host=mysql60.hostland.ru;dbname=host1323541_itstep24', 'host1323541_itstep', '269f43dc');
    } catch (PDOExeption $e) {
        echo "Невозожно установить соединение с базой данных {$e}";
    }
?>