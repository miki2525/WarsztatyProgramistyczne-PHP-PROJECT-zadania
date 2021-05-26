<?php
include ("InsuranceCar.php");
session_start();
print_r($_SESSION["car"]);
echo "<html><body><br><br><a href='index.php'>WROC</a></body></html>";
?>