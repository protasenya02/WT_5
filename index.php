<?php require_once("general.php"); ?>

<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset = "utf-8">
    <link rel = "stylesheet" href = "./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Авторы и статьи</title>
</head>
<body>

<!------------------------------------------------------->
<section class="tables">
    <div class="container">
        <div class="table_inner">
            <?php outputAuthorsArticles();
            outputAuthors();
            outputArticles();
            ?>
        </div>
    </div>
</section>
</body>
</html>