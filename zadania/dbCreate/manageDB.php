<?php

function tryCreateTable($conn)
{
    $sql = "CREATE table Student(StudentID int auto_increment not null primary key, 
Firstname varchar(255) not null, Secondname varchar(255) not null,
Salary int not null, DateOfBirth date not null);";

    try {
        $conn->query($sql);
        if ($conn->error) {
            throw new BadFunctionCallException();
        }
        echo "Pomyślnie utworzono tabele Student<br>";
    } catch (BadFunctionCallException $e) {
        echo "BadFunctionCallException: Tabela Student została już wcześniej utworzona<br>";
    }
    finally {
        $conn->close();
    }
}

$servername = "localhost";
$username = "root";
$password = "hasloBAZA20157";
$dbname = "stepik";


$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error ."<br>";
    die();
}

?>

<html>
<body>
<form action="#" method="post">
    <input type="submit" name="delete" value="Usun">
    <input type="submit" name="create" value="Tworz">
    <br><br>
    <?php
    if (isset($_POST["delete"])){
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "DROP TABLE STUDENT;";
        $conn->query($sql);
        $conn->close();
        echo "Usunięto tabelę Student<br>";
    }

    if (isset($_POST["create"])){
        $conn = new mysqli($servername, $username, $password, $dbname);
        tryCreateTable($conn);
    }
    ?>
</form>

</body>

</html>
