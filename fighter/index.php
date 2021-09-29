<?php require "../php/db.php";
$fighter = R::findOne('fighters', 'id = ?', [$_GET['id']]);
?>
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
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php require "../blocks/header.php"; ?>

    <section class="view">
        <div class="container">
            <div class="view-wrapper">
                <div class="view__photo-text">
                    <div class="view__photo slide-left">
                        <img src="<?php echo $fighter['photo']; ?>" alt="">
                    </div>

                    <div class="view__text">
                        <div class="view__text-title">
                            Краткая история бойца
                        </div>
                        <p><?php echo $fighter['info_text']; ?></p>

                    </div>
                </div>


                <div class="view__info">
                    <div class="view__info-name">
                        <?php echo $fighter['name']; ?>
                    </div>

                    <div class="info__wrapper">
                        <div class="info__item">
                            <div class="info__item-title">
                                Статус:
                            </div>

                            <div class="info__item-value">
                                <?php echo $fighter['status']; ?>
                            </div>
                        </div>
                        <div class="info__item">
                            <div class="info__item-title">
                                Родился:
                            </div>

                            <div class="info__item-value">
                                <?php echo $fighter['city']; ?>
                            </div>
                        </div>
                        <div class="info__item">
                            <div class="info__item-title">
                                Стиль:
                            </div>

                            <div class="info__item-value">
                                <?php echo $fighter['style']; ?>
                            </div>
                        </div>
                        <div class="info__item">
                            <div class="info__item-multicolumn">
                                <div class="info__column">
                                    <div class="info__item-title">
                                        Рост:
                                    </div>

                                    <div class="info__item-value">
                                        <?php echo $fighter['height']; ?> см.
                                    </div>
                                </div>
                                <div class="info__column">
                                    <div class="info__item-title">
                                        Вес:
                                    </div>

                                    <div class="info__item-value">
                                        <?php echo $fighter['weight']; ?> кг.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info__item">
                            <div class="info__item-title">
                                Дебют:
                            </div>

                            <div class="info__item-value">
                                <?php echo date("d.m.Y", strtotime($fighter['debut'])); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="comments">
        <div class="container">
            <div class="form__wrapper">
                <form action="#" class="simple__form comment__form">
                    <h1 class="simple__form-title">Оставьте свой комментарий</h1>

                    <div class="simple__form-collector">
                        <div class="simple__form-item">
                            <label class="simple__form-label">Имя</label>
                            <input type="text" class="simple__form-input" name="name">
                        </div>

                        <div class="simple__form-item">
                            <label class="simple__form-label">Email</label>
                            <input type="email" class="simple__form-input" name="email">
                        </div>
                    </div>
                    <div class="simple__form-item">
                        <label class="simple__form-label">Комментарий</label>
                        <textarea name="text" class="simple__form-textarea"></textarea>
                    </div>
                    <div class="simple__form-item">
                        <button class="general__content-btn simple__form-submit comment__form-submit">Отправить</button>
                    </div>
                </form>
            </div>
            <section id="comments">
                <h2 class="simple__form-title comments__bb">Ваши комментарии</h2>
                <div class="peoples__comments">
                    <?php
                    $comments = R::find("comments", "fighter_id = ?", [$_GET['id']]);
                    if ($comments) :
                        foreach ($comments as $comment) :
                    ?>
                            <div class="comment">
                                <div class="user">
                                    <div class="user__photo">
                                        <img src="" alt="">
                                    </div>
                                    <div class="user__info">
                                        <div class="user__info-name">
                                            <?php echo $comment['user_name']; ?>
                                        </div>
                                        <div class="user__info-email">
                                            <?php echo $comment['user_email']; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment__text">

                                    <?php echo $comment['comment_text']; ?>
                                </div>
                            </div>
                        <?php endforeach;
                    else : ?>
                        <h1 class="user__info-name">Комментарии отсутствуют!</h1>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </section>
    <?php require "../blocks/footer.php"; ?>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>