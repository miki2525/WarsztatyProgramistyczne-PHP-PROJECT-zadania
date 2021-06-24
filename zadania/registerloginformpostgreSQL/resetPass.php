<?php
include ("randomPassword.php");
$password = 'H@SLOtajne54';
$username = "s20157";

if(!empty($_POST["email"] && !empty($_POST["city"]))) {

    $city = $_POST["city"];
    $email = $_POST["email"];

    $db = new PDO("pgsql:host=localhost;port=5434", $username, $password);
    $query = $db->query("SELECT id FROM person WHERE city='$city' 
                        AND email='$email';");
    $result = $query->fetch();

    if ($result[0] > 0) {
        $id = $result[0];
        $randomPass = randomPassword();
        $newPass = password_hash($randomPass, PASSWORD_DEFAULT);

        $db->query("UPDATE person SET pass='$newPass' WHERE id='$id'");
        header("Location: loginform.php");
        setcookie("reset", $randomPass, time() + 2);
    }
    else{
        header("Location: loginform.php");
        setcookie("failed", "true", time() + 2);
        unset($_POST);
    }
}

?>