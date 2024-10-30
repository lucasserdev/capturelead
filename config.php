<?php

$db_name = 'rodrigo_costa';
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';

$dsn = "mysql:dbname=$db_name;host=$db_host;charset=utf8mb4";

$pdo = new PDO($dsn, $db_user, $db_password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
]);