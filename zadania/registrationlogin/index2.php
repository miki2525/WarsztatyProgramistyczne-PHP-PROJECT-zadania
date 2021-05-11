<?php
function checkIfMatch($content, $login, $pass){
    $lines = explode("\n========================================\n", $content);

    foreach ($lines as $line) {
        $words = explode(", ", $line);
        if ($words[0]  == $login && $words[1] == $pass){
            echo "TAK!<br>";
            return true;
        }
}
    return false;
}

session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php

if (isset($_POST["mail"]) && isset($_POST["haslo"])){

    $source = __DIR__."/file.txt";

    if (!$fd = fopen($source, "r")) {
        echo "nie mozna otworzyc do pliku";
    } else {

        $mail = strtolower($_POST["mail"]);
        $pass = $_POST["haslo"];
        $content = file_get_contents($source);
        if (checkIfMatch($content, $mail, $pass)){
            $_SESSION["login"] = $_POST["mail"];
            $_SESSION["haslo"] = $_POST["haslo"];

                echo "zalogowano jako " . $_SESSION["login"];
                echo "<br>";
            echo "<h3><a href=\"http://szuflandia.pjwstk.edu.pl/~s20157/WPRG-PHP/registrationlogin/file.txt\">
                Link do pliku z danymi</a></h3>";

                echo "<a href=\"index1.html\"> Wyloguj</a>";

        }
        else{
            session_destroy();
            echo "Zle dane logowania";
        }
    }
}
?>

</body>
</html>
