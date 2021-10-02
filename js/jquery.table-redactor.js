(function ($) {
    $.fn.tableredactor = function (table) {
        const el = this;
        el.css("border-collapse", "collapse");
        printTable(table, el);

        el.find("input").on("change", function () {
            var inputEl = $(this);
            let x = inputEl.attr('x');
            let y = inputEl.attr('y');
            table[x][y] = inputEl.val();
            inputEl.blur();
            console.log(table);
        });

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
                tableDOM += "</tr>";
            }
            el.html(tableDOM);
        }
    };
})(jQuery);