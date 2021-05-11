<?php

function checkIfExist($content, $mail)
{
    $lines = explode("\n========================================\n", $content);

    foreach ($lines as $line) {
        $words = explode(", ", $line);
        if ($words[0] == $mail) {
            return true;
        }
    }
    return false;
}
if (isset($_POST["imie"]) &&
    isset($_POST["nazwisko"]) &&
    isset($_POST["mail"]) &&
    isset($_POST["haslo"])){

    $source = __DIR__."/file.txt";
    if (!$fd = fopen($source, "a+")){
        echo "nie mozna zapisac do pliku";
    }
    else {
        $content = file_get_contents($source);
        if (checkIfExist($content, $_POST["mail"])) {
            fclose($fd);
            echo "Podany mail jest juz zarejestrowany";
            echo "<br><p><a href=\"register.html\">WROC</a></p>";
        } else {
            fwrite($fd, "\n"
                . strtolower($_POST["mail"])
                . ", ". $_POST["haslo"]
                . ", ". $_POST["imie"]
                . ", ". $_POST["nazwisko"]
                . "\n========================================");

            echo "udalo sie zarejestrowac!!!<br> zapisano dane do pliku<br>";
            fclose($fd);
            echo "<p><a href=\"index1.html\"> Mozesz teraz sie zalogowac</a></p>";
        }
    }
    }
else{
    echo "Wprowadzono niepoprawne dane";
    echo "<br><p><a href=\"register.html\">WROC</a></p>";
}


?>
