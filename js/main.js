const table = [
    ["ФИО", "Адрес", "Возраст", "Специальность"],
    ["Андрей Петров", "Ухтомского 30", "21", "Ремонтник"],
    ["Ваня Пупкин", "Бакалинская 60", "13", "Инженер"]
];

$(document).ready(function () {

    if ($("#table").length) {
        $("#table").tableredactor(table); // 5 лаба!!!!!
    }


    var gets = (function () {
        var a = window.location.search;
        var b = new Object();
        a = a.substring(1).split("&");
        for (var i = 0; i < a.length; i++) {
            c = a[i].split("=");
            b[c[0]] = c[1];
        }
        return b;
    })();

    $(".slide-left").fadeIn(1000);

    if ($(".landing").length) {
        $(window).on("scroll", function () {
            $('.header').toggleClass("active", $(this).scrollTop() > $(window).height() - 10);
        });
    } else {
        $('.header').addClass("active");
    }


    jQuery(window).scroll(function () {
        var $sections = $('section');
        $sections.each(function (i, el) {
            var top = $(el).offset().top - 100;
            var bottom = top + $(el).height();
            var scroll = $(window).scrollTop();
            var page = $(el).attr('page');
            if (scroll > top && scroll < bottom) {
                $('.navigation__list-item.active').removeClass('active');
                $('.navigation__list-item:has(a[page="' + page + '"])').addClass('active');

            }
        })
    });

    $("navigation__list-item").on("click", "a", function (event) {
        event.preventDefault();
        var id = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({ scrollTop: top }, 800);
    });

    $(".send__mail").click(function () {
        const email = $(".sendform input[name=email]");
        const text = $(".sendform textarea[name=text]");
        if (email.val() < 4) {
            email.focus();
        } else {
            var userEmail = email.val();
        }
        if (text.val() < 4) {
            text.focus();
        } else {
            var userText = text.val();
        }
        if (userEmail != undefined && userText != undefined) {
            $.ajax({
                type: "POST",
                url: 'php/sendmassage.php',
                method: 'post',
                dataType: 'html',
                data: { email: userEmail, text: userText },
                success: function (data) {
                    $(".sendform")[0].reset();
                }
            });
        }
        return false;
    });

    $(".btn__load").click(function () {
        var countFighters = $('.fighter').length;
        const howMany = 6;
        $.ajax({
            type: "POST",
            url: 'php/findmore.php',
            method: 'post',
            dataType: 'html',
            data: { countFighters, howMany },
            beforesend: function () {
                $(".loading").show();
            },
            success: function (data) {
                $(".loading").hide();
                data = JSON.parse(data);
                for (var index in data) {
                    let fighter =
                        `<div class="fighter" href="fighter/?id=${data[index].id}" onclick="window.location.href = $(this).attr('href');">
                        <h1 class="fighter__name">
                            ${data[index].name}
                        </h1>
                        <div class="fighter__photo">
                            <img src="${data[index].photo}" alt="Фото">
                        </div>
                        <p class="fighter__small-text">
                        ${data[index].info_text}
                        </p>
                    </div>`;
                    $(".fighters__wrapper").append(fighter);
                }
            }
        });
    });

    $(".comment__form-submit").click(function () {
        const email = $(".comment__form input[name=email]");
        const text = $(".comment__form textarea[name=text]");
        const name = $(".comment__form input[name=name]");
        if (name.val() < 1) {
            name.focus();
            return false;
        } else {
            var userName = name.val();
        }
        if (email.val() < 4) {
            email.focus();
            return false;
        } else {
            var userEmail = email.val();
        }
        if (text.val() < 4) {
            text.focus();
            return false;
        } else {
            var userText = text.val();
        }
        if (userEmail != undefined && userText != undefined && userName != undefined) {
            $.ajax({
                type: "POST",
                url: '../php/comment.php',
                method: 'post',
                dataType: 'html',
                data: { email: userEmail, text: userText, name: userName, id: gets['id'] },
                success: function (data) {
                    $(".comment__form")[0].reset();
                    window.location.href = "#comments";
                }
            });
        }

        return false;
    });
});