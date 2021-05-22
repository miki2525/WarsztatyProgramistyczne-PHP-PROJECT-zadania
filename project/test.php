<?php
$servername = "localhost";
$username = "root";
$password = "hasloBAZA20157";
$dbname = "videorental";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM movie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["id"] . " " . $row["name"] . " ". $row["category"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>