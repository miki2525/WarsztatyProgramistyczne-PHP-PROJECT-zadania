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

    $("#delete").unbind().click(deleteUser);

    function showContent(index) {

        $(".btn").eq(index).toggleClass("on");
        $(".text").eq(index).show("slow");
        $(".form").eq(index).slideDown("slow");
    }

    function hideContent() {
        for (let i = 0; i < button.length; i++) {
            $(".btn").eq(i).removeClass("on");
            $(".text").eq(i).hide("slow");
            $(".form").eq(i).slideUp("slow");
        }
    }

}

