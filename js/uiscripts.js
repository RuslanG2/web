$(document).ready(function () {
    $(function () {
        $("#accordion").accordion({
            collapsible: true
        });
    });

    const finishedPrice = $('.finished__price');
    const totalPrice = $(".total__price");
    totalPrice.val(finishedPrice.text());

    const addresses = [
        "ул. Центральная",
        "ул. Ленина",
        "пр. Октября",
        "пр. Салавата Юлаева",
        "ул. Пушкина",
        "ул. Революции"
    ];
    const carts = $('.product__cart');

    $(function () {
        $('#tabs').tabs();

        $('#fullcart-wrapper').dialog({
            autoOpen: false,
            draggable: false,
            width: 760,
            maxHeight: 400,
            modal: true,
            resizable: false,
            title: 'Товар'
        });

        $('#buyform-wrapper').dialog({
            autoOpen: false,
            width: 400,
            modal: true,
            resizable: false
        });

        $('#alert').dialog({
            autoOpen: false,
            modal: true,
            position: { at: "center top" },
            resizable: false,
            buttons: {
                "Окей": function () {
                    $(this).dialog("close");
                }
            }
        });

        $('#confirme').dialog({
            autoOpen: false,
            modal: true,
            resizable: false,
            position: { at: "left top" },
            buttons: {
                "Оплатить": function () {
                    $(this).dialog("close");
                    $("#buyform-wrapper").dialog("close");
                    $("#alert").dialog("open");
                },
                "Отменить": function () {
                    $(this).dialog("close");
                }
            }
        });

        $("#city__select").selectmenu();

        $("#slider-range-max").slider({
            range: "max",
            min: 1,
            max: 10,
            value: 1,
            slide: function (event, ui) {
                $("#product__count").val(ui.value);
                totalPrice.val(finishedPrice.text() * $("#product__count").val());
            }
        });
        $("#product__count").val($("#slider-range-max").slider("value"));

        $("#address").autocomplete({
            source: addresses
        });

        $("#date").datepicker({
            dateFormat: "dd.mm.yy",
            minDate: new Date()
        });


        $(document).tooltip({
            position: {
                my: "center bottom-20",
                at: "center top",
                using: function (position, feedback) {
                    $(this).css(position);
                    $("<div>")
                        .addClass("arrow")
                        .addClass(feedback.vertical)
                        .addClass(feedback.horizontal)
                        .appendTo(this);
                }
            }
        });
    });

    $(".product__cart").click(function (e) {
        if ($(e.target).is($(".buy__btn"))) {
            return;
        }
        const product = $(this);
        $('.fullcart__btn').attr('data-id', product.data('id'));
        $('.fullcart-photo#tabs-1 img').attr('src', product.find(".product__cart-photo img").attr('src'));
        $('.fullcart-photo#tabs-2 img').attr('src', product.find(".photo2").text());
        $('.fullcart-photo#tabs-3 img').attr('src', product.find(".photo3").text());
        $('.fullcart__info-discription').text(product.find(".discription").text());
        $('.fullcart__info-name').text(product.find(".product__cart-name").text());
        $('.fullcart__info-count span').text(product.find(".count").text());
        $('.fullcart__info-price').text(product.find(".product__cart-price").text());
        $('#fullcart-wrapper').dialog('open');
    });

    $(".buy__btn").click(function () {
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: '../php/chooseproduct.php',
            method: 'post',
            dataType: 'html',
            data: { product_id: id },
            success: function (data) {
                data = JSON.parse(data);
                $(".finished__price").text(data['price']);
                $(".finished__name").text(data['name']);
                totalPrice.val(finishedPrice.text());
                $('#fullcart-wrapper').dialog('close');
                var productId = $(this).data("id");
                $('#buyform-wrapper').dialog('open');
            }
        });
    });

    $("#finished__buy").click(function () {
        $('.confirme__price').text(totalPrice.val());
        $('#confirme').dialog('open');
        return false;
    });
})