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
    // извлечение результуреющего массива
    $data = $result->fetch_assoc();

    // удаление выборки
    $result->free();
    // закрытие соединения
    $mysqli->close();

    // возврат ассоциативного массива
    return $data;
}

// игра города
function citiesGame() {

    // получение последней буквы введенного слова
    $last_letter = getLastLetter();

    // текст запроса к БД
    $query = "SELECT * FROM cities WHERE city_name LIKE '$last_letter%' AND was_named ='0' ";

    // запрос к БД
    $data = connectBD($query);

    if (empty($data)) {
        echo "<p class='city_title'>В БД нет такого города.<br>Вы выйграли!</p>";
    } else {

        echo "<p class='city_title'>".$data["city_name"]."</p>";
        $id = $data["id"];
        updateCity($id);
    }


}

// получение введенного пользователем города
function getUserInput() {

    $user_input="";

    if (isset($_POST['send'])) {
        $user_input =  htmlspecialchars($_POST['city']);
    }
    // удаление лишних пробелов
    $user_input = str_replace(" ", '', $user_input);
    $user_input = mb_convert_case($user_input, MB_CASE_TITLE, "UTF-8");

    return $user_input;
}

// получение последней буквы города
function getLastLetter() {

    $user_input = getUserInput();

    $last_letter  = mb_substr($user_input, -1);
    $last_letter = mb_strtoupper($last_letter);

    return $last_letter;
}

function updateCity($id) {
    $update = "UPDATE cities SET was_named = '1' WHERE id = $id";
    connectBD($update);
}

function resetCitiesInBD() {
    $update = "UPDATE cities SET was_named = '0'";
    connectBD($update);
}
