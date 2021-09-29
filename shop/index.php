<?php require "../php/db.php"; ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мерч UFC</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Yanone+Kaffeesatz:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php require "../blocks/header.php" ?>
    <div class="header__fake" id="shop"></div>

    <section class="shop-content" page="shop">
        <div class="container">
            <h1 class="title1 shop-title">Список товаров <?php echo R::count('shop'); ?></h1>

            <section id="t-shorts">
                <?php
                $tshorts = R::find('shop', 'category = ?', ['t-shorts']);
                ?>
                <h2 class="title2">Футболки: <?php echo count($tshorts); ?></h2>
                <div class="products__wrapper">
                    <?php
                    foreach ($tshorts as $tshort) : ?>
                        <div class="product__cart" data-id="<?php echo $tshort['id']; ?>">
                            <div class="product__cart-photo">
                                <img src="<?php echo $tshort['photo1']; ?>" alt="ФОТО">
                            </div>
                            <div class="photo2 hidden"><?php echo $tshort['photo2']; ?></div>
                            <div class="photo3 hidden"><?php echo $tshort['photo3']; ?></div>
                            <div class="product__cart-name">
                                <?php echo $tshort['name']; ?>
                            </div>

                            <div class="discription hidden">
                                <?php echo $tshort['discription']; ?>
                            </div>

                            <div class="count hidden">
                                <?php echo $tshort['count']; ?>
                            </div>

                            <div class="price__block">
                                <div class="product__cart-price">
                                    <?php echo $tshort['price']; ?>₽
                                </div>
                                <button class="buy__btn" data-id="<?php echo $tshort['id']; ?>">
                                    Купить
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section id="posters">
                <?php
                $posters = R::find('shop', 'category = ?', ['poster']);
                ?>
                <h2 class="title2">Плакаты: <?php echo count($posters); ?></h2>
                <div class="products__wrapper">
                    <?php
                    foreach ($posters as $poster) : ?>
                        <div class="product__cart" data-id="<?php echo $poster['id']; ?>">
                            <div class="product__cart-photo">
                                <img src="<?php echo $poster['photo1']; ?>" alt="ФОТО">
                            </div>
                            <div class="photo2 hidden"><?php echo $poster['photo2']; ?></div>
                            <div class="photo3 hidden"><?php echo $poster['photo3']; ?></div>
                            <div class="product__cart-name">
                                <?php echo $poster['name']; ?>
                            </div>

                            <div class="discription hidden">
                                <?php echo $poster['discription']; ?>
                            </div>

                            <div class="count hidden">
                                <?php echo $poster['count']; ?>
                            </div>

                            <div class="price__block">
                                <div class="product__cart-price">
                                    <?php echo $poster['price']; ?>₽
                                </div>
                                <button class="buy__btn" data-id="<?php echo $poster['id']; ?>">
                                    Купить
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section id="magnits">
                <?php
                $magnits = R::find('shop', 'category = ?', ['magnit']);
                ?>
                <h2 class="title2">Магниты: <?php echo "6"; ?></h2>
                <div class="products__wrapper">
                    <?php
                    foreach ($magnits as $magnit) : ?>
                        <div class="product__cart" data-id="<?php echo $magnit['id']; ?>">
                            <div class="product__cart-photo">
                                <img src="<?php echo $magnit['photo1']; ?>" alt="ФОТО">
                            </div>
                            <div class="photo2 hidden"><?php echo $magnit['photo2']; ?></div>
                            <div class="photo3 hidden"><?php echo $magnit['photo3']; ?></div>
                            <div class="product__cart-name">
                                <?php echo $magnit['name']; ?>
                            </div>

                            <div class="discription hidden">
                                <?php echo $magnit['discription']; ?>
                            </div>

                            <div class="count hidden">
                                <?php echo $magnit['count']; ?>
                            </div>

                            <div class="price__block">
                                <div class="product__cart-price">
                                    <?php echo $magnit['price']; ?>₽
                                </div>
                                <button class="buy__btn" data-id="<?php echo $magnit['id']; ?>">
                                    Купить
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </section>

    <section id="about__products">
        <div class="container">
            <div id="accordion">
                <h3>Почему нужно выбрать именно нас?</h3>
                <div>
                    <p>
                        - Самые низкие цены в СНГ.<br>
						- Большой ассортимент товара.<br>
						- Оригинальный производитель.<br>
                    </p>
                </div>
                <h3>Качество товара</h3>
                <div>
                    <p>
                     - Все футболки соответствуют ГОСТу 31410-2009.<br>
					 - Также есть гарантия 1 месяц. <br>
					 - Скидка 50% на следующую покупку в случае брака.<br>
                    </p>
                </div>
                <h3>Доставка</h3>
                <div>
                    <p>
                      - Бесплатная доставка для Москвы.Для других городов доставка обойдется в 200 рублей!<br> 
					  - Товар доставляется в течение 2-7 дней.<br>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <?php require "../blocks/footer.php"; ?>

    <div id="fullcart-wrapper">
        <div class="fullcart" data-title="Товар">
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">ФОТО 1</a></li>
                    <li><a href="#tabs-2">ФОТО 2</a></li>
                    <li><a href="#tabs-3">ФОТО 3</a></li>
                </ul>
                <div class="fullcart-photo" id="tabs-1">
                    <img src="https://rocky-shop.ru/script/catalog/pic/11707.jpg" alt="ФОТО">
                </div>

                <div class="fullcart-photo" id="tabs-2">
                    <img src="https://fightwear.ru/images/stories/virtuemart/product/pr_14202_1.png" alt="ФОТО">
                </div>

                <div class="fullcart-photo" id="tabs-3">
                    <img src="https://rocky-shop.ru/script/catalog/pic/11707.jpg" alt="ФОТО">
                </div>
            </div>


            <div class="fullcart__info">
                <div class="fullcart__info-name">Футболка с Джорданом</div>
                <p class="fullcart__info-discription">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis sit iste praesentium consequuntur optio deserunt fugit dolores veritatis ullam illum harum qui perferendis earum tenetur, tempora, voluptatibus eum vero iusto?
                </p>
                <div class="fullcart__info-count">
                    В наличии: <span>3</span> шт.
                </div>
                <div class="fullcart__info-price">2000₽</div>

                <button class="fullcart__btn buy__btn" data-id="">
                    Купить
                </button>
            </div>
        </div>
    </div>

    <div id="buyform-wrapper" title="Футболка с Джорданом">
        <form action="#" class="buyform">
            <div class="buyform__item">
                <div class="fullcart__info-name finished__name">Футболка с Джорданом</div>
                <div class="fullcart__info-price">ЦЕНА: <span class="finished__price">2000</span>₽</div>
                <hr>
                </hr>
            </div>
            <div class="buyform__item">
                <label class="ib">Количество: </label>
                <input type="text" name="count" class="buyform-input" id="product__count" disabled style="max-width: 40px;display: inline;border:0; color:#0e183d; font-weight:bold;">
                <div id="slider-range-max"></div>
                </input>
                <div class="buyform__item">
                    <label for="city">Город доставки:</label>
                    <select name="city" id="city__select">
                        <option value="Уфа">Уфа</option>
                        <option value="Стерлитамак">Стерлитамак</option>
                        <option value="Салават">Салават</option>
                        <option value="Нефтекамск">Нефтекамск</option>
                        <option value="Октябрьский">Октябрьский</option>
                    </select>
                </div>
                <div class="buyform__item">
                    <label for="address">Адрес:</label>
                    <input type="text" class="buyform-input" id="address" placeholder="ул. Центральная">
                </div>
                <div class="buyform__item">
                    <label for="date">Дата доставки:</label>
                    <input type="text" class="buyform-input" id="date" placeholder="01.01.2021">
                </div>
                <div class="buyform__item">
                    <label for="promo">Промокод</label>
                    <input type="text" class="buyform-input" id="promo" placeholder="3fs458sczxgSALE" title="Промокоды можно получить в нашем инстаграме.">
                </div>
                <div class="buyform__item">
                    <label for="customer__name">Ваше ФИО:</label>
                    <input type="text" class="buyform-input" id="customer__name" placeholder="Пупин Пупа Пупович">
                </div>
                <div class="buyform__item">
                    Итоговая стоимость: <input type="text" class="total__price" value="6000" disabled>
                </div>
                <div class="buyform__item">
                    <button class="buy__btn" id="finished__buy">КУПИТЬ</button>
                </div>
        </form>
    </div>

    <div id="confirme" title="Подтвердите действие">
        <p>
            Ваш заказ составляет: <span class="confirme__price">4000</span>₽
            <br>
            <hr>
            <br>
            Соглашаясь, вы принимаете политику конфиденциальности.
        </p>
    </div>

    <div id="alert" title="Уведомление">
        <p>Вы успешно преобрели товар!!!</p>
    </div>
    <!-- <div class="cart__wrapper">
        <div id="cart">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 511.997 511.997" style="enable-background:new 0 0 511.997 511.997;" xml:space="preserve" fill="#fff">
                <g>
                    <g>
                        <path d="M405.387,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84
			S440.588,362.612,405.387,362.612z M405.387,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536
			c14.083,0,25.536,11.453,25.536,25.536S419.47,451.988,405.387,451.988z" />
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M507.927,115.875c-3.626-4.641-9.187-7.348-15.079-7.348H118.22l-17.237-72.12c-2.062-8.618-9.768-14.702-18.629-14.702
			H19.152C8.574,21.704,0,30.278,0,40.856s8.574,19.152,19.152,19.152h48.085l62.244,260.443
			c2.062,8.625,9.768,14.702,18.629,14.702h298.135c8.804,0,16.477-6.001,18.59-14.543l46.604-188.329
			C512.849,126.562,511.553,120.516,507.927,115.875z M431.261,296.85H163.227l-35.853-150.019h341.003L431.261,296.85z" />
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M173.646,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84
			S208.847,362.612,173.646,362.612z M173.646,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536
			s25.536,11.453,25.536,25.536S187.729,451.988,173.646,451.988z" />
                    </g>
                </g>
            </svg>
            <div id="cart__value">5</div>
        </div>
    </div> -->

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/main.js"></script>
    <link rel="stylesheet" href="../jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="../css/ui.css">
    <script src="../jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="../js/uiscripts.js"></script>
</body>

</html>