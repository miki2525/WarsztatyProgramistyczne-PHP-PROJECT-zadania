<?php
session_start();
//if (!isset($_SESSION["login"]) && !isset($_SESSION["haslo"])){
//    $_SESSION["login"] = "user";
//    $_SESSION["haslo"] = "pass";
//}
?>

<!DOCTYPE html>
<html>
<body>

<?php
if ($_POST["login"] == $_SESSION["login"] &&
$_POST["haslo"] == $_SESSION["haslo"]){
    $source = __DIR__."/file.txt";
    if (!$fd = fopen($source, "w")){
        echo "nie mozna zapisac do pliku";
    }
    else{
        fwrite($fd, $_POST["login"]
            . "\n"
            . $_POST["haslo"]
            ."\n====================\n");

        echo "zapisano dane do pliku<br>";
        fclose($fd);
    }
    echo "Zalogowano pomyślnie";
  echo "<br>";
  echo "<a href=\"index1.php\"> Wyloguj</a><br>";
  echo "<a href=\"file.txt\"> plik</a>";
  session_destroy();
}
else{
    echo "Zly login lub haslo";
    echo "<br>";
    echo "<a href=\"index1.php\"> Powrot</a>";
    session_destroy();
}
?>


</body>
</html>
