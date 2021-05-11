<?php

$week = readline();
$year = readline();

if($year == 2014){
    $week++;
}

$date = date_create();
date_isodate_set($date, $year, $week);
echo "Początek tygodnia: " . date_format($date, "Y-n-j") . "\n";

date_isodate_set($date, $year, $week, 7);
echo "Koniec tygodnia: " . date_format($date, "Y-n-j");

?>