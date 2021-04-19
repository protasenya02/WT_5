<?php
require_once("constants.php");

function connectBD($query) {

    // подключение к базе данных
    $mysqli = @new mysqli(HOST, USER, PASS, DB);
    // проверка соединения
    if ($mysqli->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
    }
   // установка кодировки
    $mysqli->set_charset('utf8');
    // запрос к БД
    $result = $mysqli->query($query);
    // закрытие соединения
    $mysqli->close();

    // возврат объекта mysqli_result.
    return $result;
}

function outputAuthorsArticles() {

    // текс SQL запроса
    $query = '
    SELECT * 
    FROM authors 
    LEFT JOIN articles ON authors.id = articles.author_id 
    ORDER BY authors.id';

    $result = connectBD($query);

    if ($result->num_rows > 0) {

        echo "<table><tr><th>Имя автора</th><th>Статьи</th></tr>";
        $author_name = "";

        // вывод каждой строки из таблицы
        while($row = $result->fetch_assoc()) {

            // проверка повторяются ли имена авторов (у автора несколько статей)
            if ($author_name != $row["name"]) {

                $author_name = $row["name"];
                echo "<tr><td>".$row["name"]."</td><td>".$row["title"]."</td></tr>";

            } else {
                echo "<tr><td></td><td>".$row["title"]."</td></tr>";
            }
        }

        echo "</table>";

    } else {
        echo "0 results";
    }
}

function outputAuthors() {

    $query = '
    SELECT *
    FROM authors
    ';

    // запрос к БД
    $result = connectBD($query);

    if ($result->num_rows > 0) {

        echo "<table><tr><th>id</th><th>Имя автора</th><th>Пароль</th><th>ip адрес регистрации</th><th>Дата регистрации</th></tr>";

        // вывод каждой строки из таблицы
        while($row = $result->fetch_assoc()) {

            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["password"] . "</td><td>"
                . $row["ip_registration"] . "</td><td>" . $row["data_registration"] . "</td></tr>";

        }
        echo "</table>";

    } else {
        echo "0 results";
    }
}

function outputArticles(){

    $query = '
    SELECT *
    FROM articles
    ';

    // запрос к БД
    $result = connectBD($query);

    if ($result->num_rows > 0) {

        echo "<table><tr><th>id</th><th>id автора</th><th>Заголовок</th><th>Текст</th><th>Дата публикации</th></tr>";

        // вывод каждой строки из таблицы
        while ($row = $result->fetch_assoc()) {

            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["author_id"] . "</td><td>" . $row["title"] . "</td><td>"
                . $row["text"] . "</td><td>" . $row["data_publication"] . "</td></tr>";

        }
        echo "</table>";

    } else {
        echo "0 results";
    }
}

