window.onload = function () {

    $("#formReg").on("click", validateReg);
    $("#cardnum").on("keyup", checkCard);
    $("#pass").on("keyup", passwordStrenght);


    function validateReg(e) {

        var errorMsg = "";
        const regexLetters = /^([a-zżźćńółęąśA-ZŻŹĆĄŚĘŁÓŃ -]){2,30}$/;
        const regexEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        const pass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$/;
        const card = /^(?:4[0-9]{12}(?:[0-9]{3})?|[25][1-7][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/;

        if (!regexLetters.test(document.getElementById("name").value)) {
            var errorMsg = errorMsg + "\nNieprawidłowe imię";
        }

        if (!regexLetters.test(document.getElementById("surname").value)) {
            errorMsg = errorMsg + "\nNieprawidłowe nazwisko";
        }

        if(!regexEmail.test(document.getElementById("mail").value)) {
            errorMsg = errorMsg + "\nNieprawidłowy adres e-mail";
        }

        if(!pass.test(document.getElementById("pass").value)) {
            errorMsg = errorMsg + "\nNieprawidłowe hasło";
        }

        if((document.getElementById("gender").value == "")) {
            errorMsg = errorMsg + "\nProsimy wybrać płeć";
        }

        if((document.getElementById("cardtype").value == "")) {
            errorMsg = errorMsg + "\nProsimy wybrać rodzaj karty płatniczej";
        }

        if(!card.test(document.getElementById("cardnum").value)) {
            errorMsg = errorMsg + "\nNieprawidłowy numer karty";
        }

        if(!errorMsg == ""){
            alert(errorMsg);
            return false;
        }
        return true;

    }

    function passwordStrenght(){
        var passwordValue = $("#pass").val();
        const strong = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})');
        const medium = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|' +
            '((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))');



        if (strong.test(passwordValue)){
            $("#strenght").addClass("visible");
            $("#strenght").text("MOCNE HASŁO!")
        }

        else if (medium.test(passwordValue)){
            $("#strenght").addClass("visible");
            $("#strenght").text("ŚREDNIE HASŁO!")
        }

        else {
            $("#strenght").addClass("visible");
            $("#strenght").text("SŁABE HASŁO!")
        }

        if (passwordValue.length <= 0) {
            $("#strenght").removeClass("visible");
            $("#strenght").text("$");
        }
    }

    function checkCard(){
        var gotIcon = false;
        var icon = "";
        var input = $(this).val().split("");

        if(input.length >= 4){
            gotIcon = true;

            var twoDigits = input[0] +
                input[1];
            var fourDigits = input[0] +
                input[1] +
                input[2] +
                input[3];

            if (input[0] == 4){
                icon = "visa.jpg";
            }
            else if (twoDigits == 34 ||
            twoDigits == 37){
                icon = "american.jpg";
            }

            else if (twoDigits >= 51 &&
                twoDigits <= 55 ||
            fourDigits >=2221 &&
            fourDigits <= 2720){
                icon = "master.jpg";
            }

            else if (twoDigits == 65||
                fourDigits == 6011){
                icon = "discover.jpg";
            }
            else {
                gotIcon = false;
            }
        }


        if (gotIcon){
            $(this).addClass("icon");
            $(this).css("background-image", "url(static/img/" + icon + ")");
        }
        else {
            $(this).css("background-image", "");
        }
    }
};