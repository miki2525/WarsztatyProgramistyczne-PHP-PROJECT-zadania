<?php
include ("InsuranceCar.php");
session_start();

function showList($arr){
    echo "<form action=\"#\", method=\"post\">
            <h1>a teraz w garazu jest ".count($arr). " samochodow</h1>
            <h3>Lista samochodów (na końcu listy znajduje się nowoutworzony obiekt)</h3>";
    $i = 1;
    foreach ($arr as $obj){

        echo "<label>Car" .$i. " </label><input type=\"radio\" name=\"selected\"  value=\"" .$i++. "\" required>
              <br><br>";
    }
    echo "  <input type=\"submit\" value=\"Oblicz cenę wybranego auta\" name=\"oblicz\">
            <br><br>
            <input type=\"submit\" value=\"Wyświetl dane\" name=\"szczegoly\">
            <br><br>
            <input type=\"submit\" value=\"Edytuj\" name=\"edytuj\">
            <br><br>
            <input type=\"submit\" value=\"Usuń\" name=\"usun\">
            <br><br>
        </form>";
}
if (!isset($_SESSION["array"])) {
    $car1 = new Car("CRX", 10150, 4.55);
    $car2 = new NewCar("Lancer", 50000, 4.55, true, true, true);
    $car3 = new NewCar("Tico", 50000, 4.55, false, true, false);
    $car4 = new NewCar("Octavia", 30000, 4.55, true, true, false);
    $car5 = new InsuranceCar("Lancer", 50000, 4.55, true,
        true, true, true, 1);

    $array = array($car1, $car2, $car3, $car4, $car5);
}
else{
    $array=$_SESSION["array"];
}

?>


<!DOCTYPE html>
<html>
<body>
<h1>Witaj</h1>
<?php if (!isset($_SESSION["array"])){echo "<h2>W garazu mamy ". count($array) ."samochodów</h2>";}?>
<form action="#", method="post">
    <h3>Wybierz klasę obiektu</h3>
    <select name="Class">
        <option value="Car">Car</option>
        <option value="NewCar">NewCar</option>
        <option value="InsuranceCar">InsuranceCar</option>
    </select>
    <br><br>
    <input type="submit">
</form>
<br><br>

<?php
if (isset($_POST["Class"])){
    if($_POST["Class"] =="Car") {
        ?>
        <form action="#", method="post">
            <label>Model: </label><input type="text" name="model" required>
            <br><br>
            <label>Cena: </label><input type="text" name="cena" required pattern="^[0-9]*$"> EUR
            <br><br>
            <label>Kurs: </label><input type="text" name="kurs" required pattern="^[0-9]*$" value="4"> EUR
            <br><br>
            <input type="submit" value="Zapisz" name="zapisz">
        </form>
<?php
}elseif($_POST["Class"] =="NewCar") {
?>
        <form action="#", method="post">
            <label>Model: </label><input type="text" name="model" required>
            <br><br>
            <label>Cena: </label><input type="text" name="cena" required pattern="^[0-9]*$"> EUR
            <br><br>
            <label>Kurs: </label><input type="text" name="kurs" required pattern="^[0-9]*$" value="4"> EUR
            <br><br>
            <label>Alarm: </label>TAK<input type="radio" name="alarm"  value="true" required>
            NIE<input type="radio" name="alarm" value="false">
            <br><br>
            <label>Radio: </label>TAK<input type="radio" name="radio"  value="true" required>
            NIE<input type="radio" name="radio" value="false">
            <br><br>
            <label>Climatronic: </label>TAK<input type="radio" name="climatronic"  value="true" required>
            NIE<input type="radio" name="climatronic" value="false">
            <br><br>
            <input type="submit" value="Zapisz" name="zapisz">
        </form>

<?php
}elseif($_POST["Class"] =="InsuranceCar") {
?>
        <form action="#", method="post">
            <label>Model: </label><input type="text" name="model" required>
            <br><br>
            <label>Cena: </label><input type="text" name="cena" required pattern="^[0-9]*$"> EUR
            <br><br>
            <label>Kurs: </label><input type="text" name="kurs" required pattern="^[0-9]*$" value="4"> EUR
            <br><br>
            <label>Alarm: </label>TAK<input type="radio" name="alarm"  value="true" required>
            NIE<input type="radio" name="alarm" value="false">
            <br><br>
            <label>Radio: </label>TAK<input type="radio" name="radio"  value="true" required>
            NIE<input type="radio" name="radio" value="false">
            <br><br>
            <label>Climatronic: </label>TAK<input type="radio" name="climatronic"  value="true" required>
            NIE<input type="radio" name="climatronic" value="false">
            <br><br>
            <label>Używany: </label>TAK<input type="radio" name="firstOwner"  value="true" required>
            NIE<input type="radio" name="firstOwner" value="false">
            <br><br>
            <label>Ilość lat samochodu: </label><input type="text" name="years" required pattern="^[0-9]*$"> lat
            <br><br>
            <input type="submit" value="Zapisz" name="zapisz">
        </form>

<?php
    }
}
if (isset($_POST["zapisz"])){

    if(isset($_POST["years"])){
        $car = new InsuranceCar($_POST["model"], $_POST["cena"], $_POST["kurs"], $_POST["alarm"],
            $_POST["radio"], $_POST["climatronic"], $_POST["firstOwner"], $_POST["years"]);
        array_push($array, $car);
        $_SESSION["array"] = $array;
    }

    elseif (isset($_POST["radio"])){
        $car = new NewCar($_POST["model"], $_POST["cena"], $_POST["kurs"], $_POST["alarm"],
            $_POST["radio"], $_POST["climatronic"]);
        array_push($array, $car);
        $_SESSION["array"] = $array;
    }

    else{
        $car = new Car($_POST["model"], $_POST["cena"], $_POST["kurs"]);
        array_push($array, $car);
        $_SESSION["array"] = $array;
    }

        showList($array);
}

if (isset($_POST["oblicz"])){
    $array = $_SESSION["array"];
    showList($array);
    $selectedCar = $array[$_POST["selected"] - 1];
    $selectedCar->value();
    echo "Cena auta".$_POST["selected"]." to " . $selectedCar->getCena(). "EUR";
}
if(isset($_POST["szczegoly"])){
    $_SESSION["car"] = $array[$_POST["selected"] - 1];
    header("Location: details.php");
}
if(isset($_POST["edytuj"])){
    $edit = $array[$_POST["selected"] - 1];
    $_SESSION["edit"] = $edit;
    if(get_class($edit) =="Car") {
        ?>
        <form action="#", method="post">
            <label>Model: </label><input type="text" name="model" value="<?php echo $edit->getModel();?>" required>
            <br><br>
            <label>Cena: </label><input type="text" name="cena" value="<?php echo $edit->getCena();?>"required pattern="^[0-9]*$"> EUR
            <br><br>
            <label>Kurs: </label><input type="text" name="kurs" value="<?php echo $edit->getKurs();?>"required pattern="^[0-9]*$" value="4"> EUR
            <br><br>
            <input type="submit" value="Zapisz" name="edit">
        </form>
        <?php
    }elseif(get_class($edit) =="NewCar") {
        ?>
        <form action="#", method="post">
            <label>Model: </label><input type="text" name="model" value="<?php echo $edit->getModel();?>" required>
            <br><br>
            <label>Cena: </label><input type="text" name="cena" value="<?php echo $edit->getCena();?>" required pattern="^[0-9]*$"> EUR
            <br><br>
            <label>Kurs: </label><input type="text" name="kurs" value="<?php echo $edit->getKurs();?>" required pattern="^[0-9]*$" value="4"> EUR
            <br><br>
            <label>Alarm: </label>TAK<input type="radio" name="alarm"  value="true" required>
            NIE<input type="radio" name="alarm" value="false">
            <br><br>
            <label>Radio: </label>TAK<input type="radio" name="radio"  value="true" required>
            NIE<input type="radio" name="radio" value="false">
            <br><br>
            <label>Climatronic: </label>TAK<input type="radio" name="climatronic"  value="true" required>
            NIE<input type="radio" name="climatronic" value="false">
            <br><br>
            <input type="submit" value="Zapisz" name="edit">
        </form>

        <?php
    }if(get_class($edit) == "InsuranceCar"){
        ?>
        <form action="#", method="post">
            <label>Model: </label><input type="text" name="model" value="<?php echo $edit->getModel();?>" required>
            <br><br>
            <label>Cena: </label><input type="text" name="cena" value="<?php echo $edit->getCena();?>" required pattern="^[0-9]*$"> EUR
            <br><br>
            <label>Kurs: </label><input type="text" name="kurs" value="<?php echo $edit->getKurs();?>" required pattern="^[0-9]*$" value="4"> EUR
            <br><br>
            <label>Alarm: </label>TAK<input type="radio" name="alarm"  value="true" required>
            NIE<input type="radio" name="alarm" value="false">
            <br><br>
            <label>Radio: </label>TAK<input type="radio" name="radio"  value="true" required>
            NIE<input type="radio" name="radio" value="false">
            <br><br>
            <label>Climatronic: </label>TAK<input type="radio" name="climatronic"  value="true" required>
            NIE<input type="radio" name="climatronic" value="false">
            <br><br>
            <label>Używany: </label>TAK<input type="radio" name="firstOwner"  value="true" required>
            NIE<input type="radio" name="firstOwner" value="false">
            <br><br>
            <label>Ilość lat samochodu: </label><input type="text" name="years" value="<?php echo $edit->getYears();?>" required pattern="^[0-9]*$"> lat
            <br><br>
            <input type="submit" value="Zapisz" name="edit">
        </form>

        <?php
    }
}
if (isset($_POST["edit"])){

    if(isset($_POST["years"])){
        $_SESSION["edit"]->setCena($_POST["cena"]);
        $_SESSION["edit"]->setKurs($_POST["kurs"]);
        $_SESSION["edit"]->setModel($_POST["model"]);
        $_SESSION["edit"]->setAlarm($_POST["alarm"]);
        $_SESSION["edit"]->setClimatronic($_POST["climatronic"]);
        $_SESSION["edit"]->setRadio($_POST["radio"]);
        $_SESSION["edit"]->setFirstOwner($_POST["firstOwner"]);
        $_SESSION["edit"]->setYears($_POST["years"]);
        $_SESSION["array"] = $array;
    }

    elseif (isset($_POST["radio"])){
        $_SESSION["edit"]->setCena($_POST["cena"]);
        $_SESSION["edit"]->setKurs($_POST["kurs"]);
        $_SESSION["edit"]->setModel($_POST["model"]);
        $_SESSION["edit"]->setAlarm($_POST["alarm"]);
        $_SESSION["edit"]->setClimatronic($_POST["climatronic"]);
        $_SESSION["edit"]->setRadio($_POST["radio"]);
        $_SESSION["array"] = $array;
    }

    else{
        $_SESSION["edit"]->setCena($_POST["cena"]);
        $_SESSION["edit"]->setKurs($_POST["kurs"]);
        $_SESSION["edit"]->setModel($_POST["model"]);
        $_SESSION["array"] = $array;
    }

    showList($array);
}

if(isset($_POST["usun"])){
    $array = $_SESSION["array"];
    if (count($array) > 0) {
        unset($array[$_POST["selected"] - 1]);
        $_SESSION["array"] = array_values($array);
        showList($array);

    }
    else{
        echo "lista pusta";
    }
}
?>
</body>
</html>

