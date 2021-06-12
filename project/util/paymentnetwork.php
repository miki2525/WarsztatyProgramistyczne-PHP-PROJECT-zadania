<?php

define("VISA", "/^4[0-9]{12}(?:[0-9]{3})?$/");
define("MASTERCARD", "/^5[1-5][0-9]{14}|^(222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[0-1][0-9]|2720)[0-9]{12}$/");
define("DISCOVER", "/^65[4-9][0-9]{13}|64[4-9][0-9]{13}|6011[0-9]{12}|(622(?:12[6-9]|1[3-9][0-9]|[2-8][0-9][0-9]|9[01][0-9]|92[0-5])[0-9]{10})$/");
define("AMERICANEXPRESS", "/^3[47][0-9]{13}$/");


//5196081888500645 test value

function checkpaymentNetwork($cardNumber){

    if (preg_match(VISA, $cardNumber)){
    return "VISA";
    }

    elseif (preg_match(MASTERCARD, $cardNumber)){
        return "MASTERCARD";
    }

    elseif (preg_match(DISCOVER, $cardNumber)){
        return "DISCOVER";
    }

    elseif (preg_match(AMERICANEXPRESS, $cardNumber)){
        return "AMERICAN EXPRESS";
    }

    else{
        return "UNKNOWN";
    }
}