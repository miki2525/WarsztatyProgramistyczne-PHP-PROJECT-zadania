<?php

function isValid($peselCheck){
    if(strlen($peselCheck) != 11){
        return false;
    }
    $weight = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);

    $sum = 0;
    $controlNumber = (int)substr($peselCheck, -1, 1);

    for ($i = 0; $i < count($weight); $i++) {
        $sum += (int)$peselCheck[$i] * $weight[$i];

    }

    $sum = $sum % 10;
    return (10 - $sum) % 10 == $controlNumber;
}

function getString($peselCheck){
    $months = array("Stycznia", "Lutego", "Marca", "Kwietnia", "Maja",
        "Czerwca", "Lipca", "Sierpnia", "Wrzesienia", "Października",
        "Listopada", "Grudnia");
    $yy = substr($peselCheck, 0, 2);
    $MM = substr($peselCheck, 2, 2);
    $dd = substr($peselCheck, 4, 2);
    $sex = "";
    $str= "";

    if ($MM[0] == "2"){
        $yy="20".$yy;
        $MM = substr_replace($MM, "0", 0, 1);
    }
    elseif ($MM[0] == "3"){
        $yy="20".$yy;
        $MM = substr_replace($MM, "1", 0, 1);
    }
    else{
        $yy="19".$yy;
    }
    $MM = $months[(int)$MM - 1];

    if ($peselCheck[9] % 2 == 0){
        $sex = "Jesteś kobietą.";
    }
    else{
        $sex = "Jesteś mężczyzną.";
    }
    return " Urodziłeś się " . $dd . " " . $MM . " " . $yy .".\n " . $sex;
}



if (isset($_POST['pesel'])){
    if (is_numeric($_POST['pesel'])){
            $pesel = $_POST["pesel"];
            if(!isValid($pesel)){
                echo "Nieprawidłowy PESEL";
                return;
            }
            echo getString($pesel);
    }
}
