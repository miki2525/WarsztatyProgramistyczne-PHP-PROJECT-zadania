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

  echo "Zalogowano pomyślnie";
  echo "<br>";
  echo "<a href=\"index1.php\"> Wyloguj</a>";

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
