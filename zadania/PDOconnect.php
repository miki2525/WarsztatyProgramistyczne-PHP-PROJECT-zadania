<?php
include ("dbPersonCarForm/Queries.php");
include ("dbPersonCarForm/Cars.php");
include ("dbPersonCarForm/Person.php");

$servername = "localhost";
$username = "root";
$password = "hasloBAZA20157";
$dbname = "stepik";

$conn = new PDO("mysql:host=localhost;dbname=stepik", $username, $password);

    if (PDO::ATTR_CONNECTION_STATUS!=7) {
        echo "Connection failed: " . PDO::ATTR_CONNECTION_STATUS ."<br>";
        die();
    }

    else{
        echo "Connection Succsess!";
    }

    try {
        $statement=$conn->prepare(Queries::$createPerTable);
        $statement->execute();
        echo "\nPomyslnie utworzono tabele Person<br>";
    } catch (PDOException $e) {
        echo "\nTabela Person została już wcześniej utworzona\n Exception: " . $e->getMessage();
    }

    try {
        $statement=$conn->prepare(Queries::$createCarsTable);
        $statement->execute();
        echo "\nPomyślnie utworzono tabele Cars<br>";
    } catch (PDOException $e) {
        echo "\nTabela Cars została już wcześniej utworzona\n Exception: " . $e->getMessage();
    }



