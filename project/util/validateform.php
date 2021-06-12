<?php

function validate($array) {
    $mail = $array["mail"];
    $regexLetters = "/^([a-zżźćńółęąśA-ZŻŹĆĄŚĘŁÓŃ -]){2,30}$/";
    $regexEmail = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";
    $pass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$/";
    $card = "/^(?:4[0-9]{12}(?:[0-9]{3})?|[25][1-7][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/";

        if (!preg_match($regexLetters, $array["firstname"])) {
            return  false;
        }

        if (!preg_match($regexLetters, $array["surname"])) {
            return false;
        }

        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if(!preg_match($pass, $array["pass"])) {
            return false;
        }

        if(($array["gender"]== "")) {
            return false;;
        }

        if(($array["cardType"] == "")) {
            return false;
        }

        if(!preg_match($card,$array["cardNum"])) {
            return false;
        }

        return true;

    }