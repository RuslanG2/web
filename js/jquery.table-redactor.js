(function ($) {
    $.fn.tableredactor = function (table) {
        const el = this;
        el.css("border-collapse", "collapse");
        printTable(table, el);
        detectDel();

        $("#add-row").click(function () {
            let countEl = table[0].length;
            let newRow = [];
            for (let i = 0; i < countEl; i++) {
                newRow.push('');
            }
            table.push(newRow);
            console.log(table);
            addNewRow(newRow);
        });

        function detectDel() {
            $(".del-btn").click(function () {
                let id = $(this).data('id');
                table.splice(id, id);
                console.log(table);
                $(this).parents('.table__row').fadeOut(300, function () { $(this).remove(); });
            });

        }

        function findElements() {
            el.find("input").on("change", function () {
                var inputEl = $(this);
                let x = inputEl.attr('x');
                let y = inputEl.attr('y');
                table[x][y] = inputEl.val();
                inputEl.blur();
                console.log(table);
            });
        }

        function addNewRow(newRow) {
            let row = "<tr class='table__row'>";
            for (let i = 0; i < newRow.length; i++) {
                row += "<td class='table__column'><input type='text' class='unit__content' value='" + table[table.length - 1][i] + "' x='" + Number(table.length - 1) + "' y='" + i + "'></td>";
            }
            row += "<td class='table__column'><button class='del-btn' data-id='" + Number(table.length - 1) + "'>Удалить</button></td></tr>";
            el.append($(row));
            findElements();
            detectDel();
        }

        function printTable(table, el) {
            var tableDOM = "";
            for (var x = 0; x < table.length; x++) {
                tableDOM += "<tr class='table__row'>";
                for (let y = 0; y < table[x].length; y++) {
                    if (x === 0) {
                        tableDOM += "<th class='table__title'><div class='unit__content'>" + table[x][y] + "</div></th>";
                    } else {
                        tableDOM += "<td class='table__column'><input type='text' class='unit__content' value='" + table[x][y] + "' x='" + x + "' y='" + y + "'></td>";
                    }
                }
                tableDOM += "<td class='table__column'><button class='del-btn' data-id='" + x + "'>Удалить</button></td></tr>";
            }
            el.html(tableDOM);
            findElements();
            $(".table-wrapper").append($("<button id='add-row'>Добавить строку</button>"))
        }
    };
})(jQuery);