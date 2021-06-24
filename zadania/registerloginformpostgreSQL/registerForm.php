<?php
    $password = 'H@SLOtajne54';
    $username = "s20157";

if (isset($_POST["fname"])){


    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $pass = $_POST['pass'];
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    $mail = $_POST['mail'];
    $city = $_POST['city'];

    $db = new PDO("pgsql:host=localhost;port=5434", $username, $password);

    $db->query("INSERT INTO person(firstname, secondname, pass, email, city) values
('$fname', '$sname', '$passHash', '$mail', '$city');");

    echo "ZAPISANO, <a href='registerForm.php'> WRÓĆ</a>";
    unset($_POST);
}
$db = new PDO("pgsql:host=localhost;port=5434", $username, $password);
?>


<html>
<body>
<h1><?php  $db = new PDO("pgsql:host=localhost;port=5434", $username, $password);
$query = $db->query("SELECT COUNT(id) FROM person;");
$result = $query->fetch();
echo "Jest " .$result[0]." zarejestrowanych użytkowników.";?></h1>
<form method="post", action="#">
    <fieldset>ZAREJESTRUJ SIĘ!</fieldset>
    <label>Imię: </label><input type="text" name="fname" required>
    <label>Nazwisko: </label><input type="text" name="sname" required>
    <label>Hasło: </label><input type="password" name="pass" required>
    <label>Adres e-mail: </label><input type="email" name="mail" required>
    <label>Miasto pochodzenia: </label><input type="text" name="city" required>
    <input type="submit" value="ZAREJESTRUJ">
</form>
</body>
</html>
