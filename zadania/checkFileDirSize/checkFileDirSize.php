<?php
$input = $_POST["search"];
$input = strtolower($input);

if(is_dir($input)){
    $files = scandir($input);
    $size = 0;
    foreach ($files as $file){
        if ($file != "." && $file != "..") {
            $size += filesize($input. "/" .$file);
        }
    }

    echo "Rozmiar katalogu(wszystkich plików): "
        .round($size/ 1024,4) . "KB &nbsp&nbsp"
        .round($size / 1024 / 1024,4) . "MB &nbsp&nbsp"
        .round($size / 1024 / 1024 / 1024,4) . "GB";
}

elseif(file_exists($input)){
   displaySizes($input);
}

elseif(checkFileInDir($input)){
displaySizes("dir/".$input);
}

else{
    echo "Not found in base!";
}

function checkFileInDir($input){
    $arr = scandir("dir");
    foreach ($arr as $search){
        if ($search == $input){
            return true;
        }
    }
    return false;
}

function ($file){
    $size = filesize($file);

    echo "Rozmiar pliku: "
        .round($size/ 1024,4) . "KB &nbsp&nbsp"
        .round($size / 1024 / 1024,4) . "MB &nbsp&nbsp"
        .round($size / 1024 / 1024 / 1024,4) . "GB";
}

?>