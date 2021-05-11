<?php

if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST["mathOperation"])) {
    if (is_numeric($_POST['num1']) && is_numeric($_POST['num2'])){
    $a = $_POST['num1'];
    $b = $_POST['num2'];

    switch ($_POST["mathOperation"]){
        case "add":
            echo $a + $b;
            break;

        case "sub":
            echo $a - $b;
            break;

        case "mult":
            echo $a * $b;
            break;

        case "div":
            if ($b == 0){
                echo "Nie można dzielić przez 0";
                break;
            }
            echo $a / $b;
            break;
    }
    }
    else{echo "Błędny input";}
}

/////ADVANCE

if (isset($_POST['num3']) && isset($_POST["mathOperationAdv"])) {
    if (is_numeric($_POST['num3'])){
        $c = $_POST['num3'];

        switch ($_POST["mathOperationAdv"]){
            case "cos":
                echo cos($c);
                break;

            case "sin":
                echo sin($c);
                break;

            case "tg":
                echo tan($c);
                break;

            case "bTd":
                if ($c < 0){
                    echo "Proszę podać nieujemną liczbę";
                    break;
                }
                echo bindec($c);
                break;

            case "dTb":
                echo decbin($c);
                break;

            case "dTh":
                echo dechex($c);
                break;

            case "hTd":
                echo hexdec($c);
                break;

            case "degTrad":
                echo deg2rad($c);
                break;

            case "radTdeg":
                echo rad2deg($c);
                break;
        }
    }
    else{echo "Błędny input";}
}

?>

