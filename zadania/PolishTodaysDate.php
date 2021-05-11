<?php
//checkdate
//$check = explode("-", readline());
//
//if(checkdate($check[1], $check[0], $check[2])){
//    echo "Poprawna data";
//}
//
//else echo "Niepoprawna data"

date_default_timezone_set("Poland");

$day = array('niedziela', 'poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek', 'sobota');
$month = array('', 'styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec', 'lipiec', 'sierpień',
    'wrzesień', 'październik', 'listopad', 'grudzień');

$date = "Dzisiaj jest " . $day[date("w")] . date(", d ") .$month[date("n")] .
    date(" Y, h:i:sa, O") . " GMT.";

echo $date;

?>