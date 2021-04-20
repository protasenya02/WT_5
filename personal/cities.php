<?php require_once("personal.php"); ?>

<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset = "utf-8">
    <link rel = "stylesheet" href = "assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Города</title>
</head>
<body>

<!------------------------------------------------------->
<section class="product_form" action="personal.php">
    <div class="container">
        <form class="input_form" method="POST">
            <div class="form_inner">
                <div class="form_title">Игра города</div>
                <input type="text" pattern="[А-Яа-яЁё ]+$" name="city" placeholder="Введите название города"
                       value="<?php if (isset($_POST['city'])) Echo $_POST['city']; ?>" required>
                <div class="buttons">
                    <input type="submit" name="send" value="Ответить">
                    <input type="submit" name="reset" value="Заново">
                </div>
            </div>
            <?php citiesGame(); ?>
        </form>
    </div>
</section>
</body>
</html>