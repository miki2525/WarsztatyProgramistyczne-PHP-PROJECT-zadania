<?php
$input = explode(" ", readline());

if ($input[0] <= 0 || $input[1] <= 0
    || !is_numeric($input[0])
    || !is_numeric($input[1])){
    echo "BŁĄD";
    return;
}

$firstArr = explode(" ", readline());
$secArr = explode(" ", readline());

    for ($index = 0; $index < count($firstArr); $index++){
        if(!is_numeric($firstArr[$index])) {
            echo "BŁĄD";
            return;
        }
}
    for ($index = 0; $index < count($secArr); $index++){
    if(!is_numeric($secArr[$index])) {
            echo "BŁĄD";
            return;
    }
}


for ($i = 0; $i < count($firstArr); $i++){
        if($i == count($firstArr) - 1){
            echo $firstArr[$i];
        }
        else {
            echo $firstArr[$i] . " ";
        }
}
echo "\n";

for ($i = 0; $i < count($secArr); $i++){
    if($i == count($secArr) - 1){
        echo $secArr[$i];
    }
    else {
        echo $secArr[$i] . " ";
    }
}
echo "\n";
$scal = 0;
for ($i = 0; $i < count($firstArr); $i++){
        $scal += ($firstArr[$i] * $secArr[$i]);
}

echo $scal;

?>




