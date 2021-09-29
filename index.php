<?php require "php/db.php"; ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бойцы UFC</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Yanone+Kaffeesatz:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="landing">
    <?php require "blocks/header.php"; ?>

    <section class="general" id="general" page="main">
        <div class="container">
            <div class="general__content">
                <h1 class="general__content-title">
                    Узнай о любимых бойцах UFC больше
                </h1>

                <p class="general__content-text">
                    Полная история жизни любимых бойцов.<br>
                    Интересные факты, и многое другое<br>
                    только для тебя.
                </p>
                <a href="#main" class="general__content-btn">
                    Узнать больше
                </a>
            </div>

            <div class="general__photo slide-left">
            </div>
        </div>
    </section>

    <section class="main" id="main" page="fighters">
        <div class="container">
            <div class="fighters__wrapper">
                <?php
                $fighters = R::find("fighters", "WHERE id>0 LIMIT 6");
                foreach ($fighters as $fighter) :
                ?>
                    <div class="fighter" href="fighter/?id=<?php echo $fighter['id']; ?>" onclick="window.location.href = $(this).attr('href');">
                        <h1 class="fighter__name">
                            <?php echo $fighter['name']; ?>
                        </h1>
                        <div class="fighter__photo">
                            <img src="<?php echo $fighter['photo']; ?>" alt="">
                        </div>
                        <p class="fighter__small-text">
                            <?php echo $fighter['info_text']; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="loading"></div>
            <div class="btns__wrapper">
                <button class="general__content-btn btn__load">Загрузить еще</button>
            </div>
        </div>
    </section>

    <?php require "blocks/footer.php"; ?>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>