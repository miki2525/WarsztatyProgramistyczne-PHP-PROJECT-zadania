<?php
$input = readline();
$input2 = readline();

$date1 = strtotime($input);
$date2 = strtotime($input2);

$diff = abs($date1 - $date2);

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

printf("%d lat, %d miesięcy, %d dni", $years, $months, $days);

?>

