<?php
include ("Person.php");
include ("Cars.php");
include ("Queries.php");

session_start();
function tryCreateTable($conn)
{
    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error ."<br>";
        die();
    }

    try {
        $conn->query(Queries::$createPerTable);
        if ($conn->error) {
            throw new BadFunctionCallException();
        }
        echo "Pomyslnie utworzono tabele Person<br>";
    } catch (BadFunctionCallException $e) {
        echo "BadFunctionCallException: Tabela Person została już wcześniej utworzona<br>";
    }

    try {
        $conn->query(Queries::$createCarsTable);
        if ($conn->error) {
            throw new BadMethodCallException();
        }
        echo "Pomyślnie utworzono tabele Cars<br>";
    } catch (BadMethodCallException $e) {
        echo "BadMethodCallException: Tabela Cars została już wcześniej utworzona<br>";
    }
    finally {
        $conn->close();
    }
}

function sendQuery($conn, $query)
{

    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error ."<br>";
        die();
    }

if ($conn->query($query) === TRUE) {
  echo "Wstawiono Obiekt<br>";
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}
        $conn->close();
}

$servername = "localhost";
$username = "root";
$password = "hasloBAZA20157";
$dbname = "stepik";

?>

<html>
<body>
<form action="#" method="post">
    <input type="submit" name="create" value="Tworz tabelki">
</form>
    <br><br>
    <?php
    if (isset($_POST["create"])){
        $conn = new mysqli($servername, $username, $password, $dbname);
        tryCreateTable($conn);
        unset($_POST["create"]);
    }
    ?>
<br><br>
<form action="#", method="post">
    <fieldset>
        <legend>Stworz obiekt Person</legend>
        <br><br><label>Imie: </label><input type="text" name="fname" required>
        <br><br><label>Nazwisko: </label><input type="text" name="sname" required>
    <input type="submit" name="insertPer" value="Tworz Person" required>
    </fieldset>
</form>
    <?php
    if (isset($_POST["insertPer"])){
        $person = new Person($_POST["fname"], $_POST["sname"]);
        $conn = new mysqli($servername, $username, $password, $dbname);
        sendQuery($conn, Queries::insertPerson($person->getPersonFirstname(),
            $person->getPersonSecondname()));
        unset($_POST["insertPer"]);
    }
    ?>
<br><br>

<form action="#", method="post">
    <fieldset>
        <legend>Stworz obiekt Cars</legend>
        <br><br><label>Model: </label><input type="text" name="model" required>
        <br><br><label>Cena: </label><input type="number" step="0.01" name="cena" required>
        <br><br><br><label>Data kupna: </label><input type="datetime-local" name="data" required>
        <br><br><label>Person_id: </label><select name="personid" required>
            <option value="" selected disabled></option>
            <?php  $sql = new mysqli($servername, $username, $password, $dbname);
            $result = $sql->query(Queries::$selectPersonId);

            if ($result->num_rows > 0 ) {
                foreach($result as $row){
                    ?><option value="<?php echo $row['Person_id'];?>"
                              name="<?php echo $row['Person_id'];?>">
                    <?php echo $row['Person_id'];?></option>"
                <?php
            }
                }
            ?>
            <input type="submit" name="insertCar" value="Tworz Cars">
            <p>Jesli nie ma zadnego Person_id na liscie, stworz najpierw obiekt Person</p>

    </fieldset>
</form>
<?php
if (isset($_POST["insertCar"])){

    $conn = new mysqli($servername, $username, $password, $dbname);
    $datestr = $_POST["data"] . ":00";
    $dateofbuy= date('Y-m-d H:i:s', strtotime($datestr));
    $car = new Cars($_POST["model"], $_POST["cena"], $dateofbuy, $_POST["personid"]);
    sendQuery($conn, Queries::insertCar($car->getCarsModel(), $car->getCarsPrice(),
        $car->getCarsDayOfBuy(), $car->getPersonId()));
    unset($_POST["insertCar"]);
}
?>
<br><br>
<form action="#", method="get">
    <input type="submit" name="show" value="Wyswietl tabele">
</form>
<br><br>
<?php
if (isset($_GET["show"])){
$sql = new mysqli($servername, $username, $password, $dbname);

     $result = $sql->query(Queries::$selectAll);

if ($result->num_rows > 0) {
?>
<table>
    <tr>
        <th>Person_ID</th>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Cars_ID</th>
        <th>Model</th>
        <th>Cena</th>
        <th>Data kupna</th>
        <th>Person_ID(fk)</th>
    </tr>
    <?php
}
    foreach ($result as $row){
        ?>
    <tr>
        <td><?php echo $row['Person_id'];?></td>
        <td><?php echo $row['Person_firstname'];?></td>
        <td><?php echo $row['Person_secondname'];?></td>
        <td><?php echo $row['Cars_id'];?></td>
        <td><?php echo $row['Cars_model'];?></td>
        <td><?php echo $row['Cars_price'];?></td>
        <td><?php echo $row['Cars_day_of_buy'];?></td>
        <td><?php echo $row['Person_id'];?> </td>
        <td><form method="post", action="process.php">
            <input type="submit" name="delete" value="<?php echo $row['Cars_id']?>"><label>USUN</label>
            <input type="submit" name="edit" value="<?php echo $row['Cars_id']?>"><label>EDYTUJ</label>
        </form></td>

       </tr>
        <?php } ?>
</table><?php $sql->close(); unset($_POST["show"]);} ?>

</body>
</html>