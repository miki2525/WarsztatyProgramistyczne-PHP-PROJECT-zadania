window.onload = function () {

    var button = document.getElementsByClassName("btn");
    for (let i = 0; i < button.length; i++) {
        button[i].addEventListener("click", function () {
            if (!button[i].className.includes(" on")) {
                $(".Welcome").css("display", "none");
                hideContent();
                showContent(i);

            }
        });
    }

    function showContent(index) {

        $(".btn").eq(index).toggleClass("on");
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
        for (let i = 0; i < button.length; i++) {
            $(".btn").eq(i).removeClass("on");
            $(".text").eq(i).hide("slow");
            $(".form").eq(i).slideUp("slow");
        }
    }

    function checkRes(obj){
        if (obj == null){
            return false;
        }
        else { return true;}
    }

}

