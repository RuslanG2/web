<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактор таблиц</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Yanone+Kaffeesatz:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/tableredactor.css">
</head>

<body>
    <?php require '../blocks/header.php'; ?>
    <div class="header__fake" id="redactor"></div>
    <section class="redactor-content" page="redactor">
        <div class="container">
            <h1 class="title1">Редактор таблиц</h1>

            <div class="table-wrapper">
                <table id="table">
                </table>
            </div>

            <div id="pussy" style=" margin-top: 5%;"></div>
        </div>
    </section>

    <?php require '../blocks/footer.php'; ?>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery.table-redactor.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>