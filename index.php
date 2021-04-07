<?php

require_once("constants.php");

// подключение к базе данных
$mysqli = @new mysqli(HOST, USER, PASS, DB);
// проверка соединения
if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
}
// установка кодировки
$mysqli->set_charset('utf8');

