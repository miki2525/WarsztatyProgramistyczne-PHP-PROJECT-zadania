<?php

$a = readline();

    if($a < 1 || $a > 12){
        echo "BŁĄD";
        return;
    }
    if(!is_numeric($a)) {
        echo "BŁĄD";
        return;
    }

    $months = array("Styczeń", "Luty", "Marzec", "Kwiecień", "Maj",
        "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik",
        "Listopad", "Grudzień");
    $days = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

    echo $months[$a-1] . ": " . $days[$a-1] . " dni"
?>