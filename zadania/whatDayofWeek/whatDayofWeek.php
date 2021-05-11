<?php
$date = $_POST["date"];

$day = array('niedziela', 'poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek', 'sobota');
$month = array('', 'styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec', 'lipiec', 'sierpień',
    'wrzesień', 'październik', 'listopad', 'grudzień');


echo date("d ", strtotime($date)) . $month[date("n", strtotime($date))]
    . date(" Y ", strtotime($date)) . "to " . $day[date("w", strtotime($date))];
?>