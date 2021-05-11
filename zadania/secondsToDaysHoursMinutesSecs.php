<?php

$input = readline();

$days = floor($input/(60*60*24));
$hours = floor(($input - $days * 60*60*24) / (60*60));
$minutes = floor(($input - $days * 60*60*24 - $hours * 60*60) / 60);
$secs = floor(($input - $days * 60*60*24 - $hours * 60*60 - $minutes * 60));

printf("%d dni, %d godzin, %d minut i %d sekundy", $days, $hours, $minutes, $secs);

?>