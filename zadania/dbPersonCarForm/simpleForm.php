<?php
include ("Queries.php");

$servername = "localhost";
$username = "root";
$password = "hasloBAZA20157";
$dbname = "stepik";

if (!empty($_POST["sql"])){
    $query=strtolower($_POST["sql"]);
    $conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_errno ) {
    printf("Connect failed: %s<br />", $conn->connect_error);
    exit(1);}

    $res = $conn->query($query);
    if ($conn->errno){
        printf("Error: %s<br />", $conn->error);
        exit(2);
    }
    else{
        printf("GOOD QUERY");
    }
        $conn->close();
    unset($_POST["sql"]);

}
?>



<html>
<link rel="stylesheet" href="table.css">
<body>
<br>
<img src="tabelaPerson.JPG"> <img src="tabelaCars.JPG" style="margin-left: 40px">
<br><br><br><br>
<form action="#", method="POST">
    <label>ZAPYTANIE SQL: </label><input type="text" name="sql" required style="width: 100%"><br>
    <label style="font-size: 12px">Eg. "UPDATE person SET person_firstname='Liuk' WHERE person_id=1;"</label>
    <br><br>
    <input type="submit" value="Wyślij">
</form>

<br><br><br><br>
<?php
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
        </tr>
    <?php }
    $sql->close();?>
</table>
</body>
</html>
