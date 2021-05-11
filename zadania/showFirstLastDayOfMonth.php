<?php

$input = readline();

echo "Pierwszy dzień : " . date("Y-m-01", strtotime($input))
    . " - Ostatni dzień : " . date("Y-m-t", strtotime($input));

?>