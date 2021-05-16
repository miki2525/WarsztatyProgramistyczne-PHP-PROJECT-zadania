window.onload = function () {


    $("table tr").on("click", function (){
        $(this).toggleClass(" selected");
        $(this).children('td').each(function(i){
        });
    })
    $("#paddlelock").on("click", function () {

        var data = Array();
        $("table tr.selected").each(function (i) {
            data[i] = Array();
            $(this).children('td').each(function (ii) {
                data[i][ii] = $(this).text();
            });
        });
        console.log(data);
    });

    var table = $('table');

    $('th')
        .wrapInner('<span title="sort this column"/>')
        .each(function(){

            var th = $(this),
                thIndex = th.index(),
                inverse = false;

            th.click(function(){

                table.find('td').filter(function(){

                    return $(this).index() === thIndex;

                }).sortElements(function(a, b){

                    if( $.text([a]) == $.text([b]) )
                        return 0;

                    return $.text([a]) > $.text([b]) ?
                        inverse ? -1 : 1
                        : inverse ? 1 : -1;

                }, function(){

                    // parentNode is the element we want to move
                    return this.parentNode;

                });

                inverse = !inverse;

            });

        });

    $(".Welcome").css("display", "none");
    hideContent();
    showContent(0);

        var button = document.getElementsByClassName("button");
        button[0].addEventListener("click", function () {
                $(".Welcome").css("display", "none");
                hideContent();
                showContent(i);
            });


    function showContent(index) {
        $(".text").eq(index).show("slow");
        $(".form").eq(index).slideDown("slow");
        switch (index) {
            case 0: $("#submit0").unbind().click(getWeightDetails);
            break;

            case 1: $("#submit1").unbind().click(getAirportDetails);
            break;
        }
    }

    function hideContent() {
            $(".button").eq(0).hide();
            $(".text").eq(0).hide("slow");
    }

    function checkRes(obj){
        if (obj == null){
            return false;
        }
        else { return true;}
    }

}

