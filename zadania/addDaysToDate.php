<?php
$input = readline();
$days = readline();

echo "Oryginalna data: " . date("Y-m-d", strtotime($input)) . "\n";
echo "Przed " .$days. " dniami: " . date("Y-m-d", strtotime($input . "-".$days." days")) . "\n";
echo "Po " .$days. " dniach: " . date("Y-m-d", strtotime($input . "+".$days." days")) . "\n";

?>