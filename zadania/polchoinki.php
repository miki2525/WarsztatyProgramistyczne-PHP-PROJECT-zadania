<?php
$n = (int) readline();

if(!is_numeric($n)) {
    echo "BŁĄD";
    return;
}

if($n <=0){
    return;
}

for ($i = 1; $i <= $n; $i++){
    $numOfStars = $i;
    for ($j = 1; $j <= $numOfStars; $j++) {
        echo "*";
    }
        echo "\n";
}

for ($i = $n; $i > 0; $i--){
    $numOfStars = $i;
    for ($j = $numOfStars; $j > 0; $j--) {
        echo "*";
    }
    echo "\n";
}
for ($i = $n; $i > 0; $i--){
    $numOfStars = $i;
    $numOfSpaces = $n - $i;
    for ($j = $numOfSpaces; $j > 0; $j--) {
        echo " ";
    }
    for ($j = $numOfStars; $j > 0; $j--) {
        echo "*";
    }
    echo "\n";
}
for ($i = 1; $i <= $n; $i++){
    $numOfSpaces = $n - $i;
    $numOfStars = $i;
    for ($j = 0; $j < $numOfSpaces; $j++) {
        echo " ";
    }
    for ($j = 1; $j <= $numOfStars; $j++) {
        echo "*";
    }
    echo "\n";
}

?>
