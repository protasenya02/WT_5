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

// текс SQL запроса
$query = "SELECT * FROM authors";

// запрос к БД
$result = $mysqli->query($query);


if ($result->num_rows > 0) {

    echo "<table><tr><th>id</th><th>Имя автора</th><th>Пароль</th><th>ip при регистрации</th><th>Дата регистрации</th></tr>";

    // вывод каждой строки из таблицы
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["password"]."</td><td>"
            .$row["ip_registration"]."</td><td>".$row["data_registration"]."</td></tr>";
    }

    echo "</table>";

} else {
    echo "0 results";
}

// закрытие соединения
$mysqli->close();


