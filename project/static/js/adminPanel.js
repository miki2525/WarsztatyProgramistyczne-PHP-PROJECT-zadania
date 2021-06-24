window.onload = function () {

    $("table:not(.csvTable) tr:not(:first)").each(function (i){
        $(this).children().eq(0).text(++i);
    });

    $(".csvTable tr:not(:first)").each(function (i){
        $(this).children().eq(0).text(++i);
    });


    $("table:not(.csvTable) tr:not(:first)").on("click", function (){
        $("tr").removeClass("selected");
        $(this).toggleClass(" selected");
        $(this).children('td').each(function(i){
        });
    });

    $("#new").on("click", function () {
        $(".editForm").show();
        let index = 0;
        for (let i = 0; i < 5; i++){
            $(".editForm form").children('input').eq(i).val("");
        }
        $("#gender").children("option:selected").text("");
        $("#cardtype").children("option:selected").text("");
        $("#cardnum").val("");
    });



    $("#edit").on("click", function () {

        var data = Array();
        $("table tr.selected").children('td').each(function (i){
            data[i] = $(this).text();
        });
        /////fetch do bazy z numerem id data[1];
        if (data.length > 0){
            $(".editForm").show();
            let index = 1;
            for (let i = 0; i < 5; i++){
                $(".editForm form").children('input').eq(i).val(data[index++]);
            }
            $("#gender").children("option:selected").text(data[index++]);
            $("#cardtype").children("option:selected").text(data[index++]);
            $("#cardnum").val(data[index++]);
            }
        });


    $("#delete").on("click", function () {
        if (confirm("Czy napewno chcesz usunąć tego użytkownika?")) {

            var data = Array();
            $("table tr.selected").children('td').each(function (i) {
                data[i] = $(this).text();
            });
            if (data.length > 0) {
                $("#delete").val(data[1]);
            }
            else {
                return false;
            }
            return true;
        }
        else {
        return false;
        }});

    //             var url = "../controller/adminPanelController.php?delete=5";
    //             // var formData = new FormData();
    //             // formData.append("delete", 5);
    //                 fetch(url);
    //                     // method: "POST",
    //                     // body: formData})
    //                     // .then();
    //         }}});


    $("#upload").on("change", function (){
        $("#send").show();
    })


    var button = document.getElementById("manageUsers");
    button.addEventListener("click", function () {

                $(".Welcome").css("display", "none");
                hideContent();
                showContent();
                enableSorting();
            });

    if(document.cookie.indexOf("zapisano") != -1){
            $("header").append("<h2 style='color: #ff0000; text-align: center'>ZAPISANO POMYŚLNIE DO BAZY</h2>");
            setTimeout(function (){$("h2").remove()}, 2000);
    }

    if(document.cookie.indexOf("usunieto") != -1){
        $("header").append("<h2 style='color: #ff0000; text-align: center'>USUNIĘTO UŻYTKOWNIKA</h2>");
        setTimeout(function (){$("h2").remove()}, 2000);
    }

    function showContent() {
        $(".text").show("slow");
        $(".content").slideDown("slow");
    }

    function hideContent() {
            $("#manageUsers").hide();
            $(".text").hide("slow");
            $(".csvTable").hide();
    }

    function enableSorting() {
        var table = $('table');

        $('th')
            .wrapInner('<span title="sort this column"/>')
            .each(function () {

                var th = $(this),
                    thIndex = th.index(),
                    inverse = false;

                th.click(function () {

                    table.find('td').filter(function () {

                        return $(this).index() === thIndex;

                    }).sortElements(function (a, b) {

                        if ($.text([a]) == $.text([b]))
                            return 0;

                        return $.text([a]) > $.text([b]) ?
                            inverse ? -1 : 1
                            : inverse ? 1 : -1;

                    }, function () {

                        // parentNode is the element we want to move
                        return this.parentNode;

                    });

                    inverse = !inverse;

                });

            });
    }

    function checkRes(obj){
        if (obj == null){
            return false;
        }
        else { return true;}
    }

}

