<?php

session_start();
$password = 'H@SLOtajne54';
$username = "s20157";

if (isset($_POST["delete"])){
    $id = $_POST["delete"];
    $db = new PDO("pgsql:host=localhost;port=5434", $username, $password);
    $statement = $db->prepare("DELETE from person WHERE id='$id'");
    $statement->execute();
    header("Location: loginform.php");
    setcookie("delete", "true", time() + 2);
    unset($_POST["delete"]);
    die();
    session_destroy();
}

elseif (isset($_POST["edit"])){
    $_SESSION["id"] = $_POST["edit"];
    $id = $_POST["edit"];
    $db = new PDO("pgsql:host=localhost;port=5434", $username, $password);
    $statement = $db->query("SELECT * from person WHERE id='$id'");
    $user=$statement->fetch();

if (!empty($user)){
    ?>
    <html>
    <body>
    <form action="#", method="post">
        <legend>EDYTUJ DANE</legend>
        <label>Imie: </label><input type="text" name="fname" value="<?php echo $user['firstname']?>" required>
        <label>Nazwisko: </label><input type="text" name="sname" value="<?php echo $user['secondname']?>" required>
        <label>E-mail: </label><input type="text" name="mail" value="<?php echo $user['email']?>" required>
        <label>Miasto: </label><input type="text" name="city" value="<?php echo $user['city']?>" required>
        <label>Hasło: </label><input type="text" name="pass">
        <input type="submit" name="update" value="Update">
    </form>
    </body>
    </html>
<?php
unset($_POST['edit']);
}
}

if (isset($_POST["update"])){
    $db = new PDO("pgsql:host=localhost;port=5434", $username, $password);
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $email = $_POST['mail'];
    $city = $_POST['city'];
    $pass= $_POST['pass'];
    $id = $_SESSION["id"];
    if ($pass == "") {
        $db->query("UPDATE person set firstname='$fname', secondname='$sname',
                     email='$email', city='$city' WHERE id='$id'");
    }
    else{
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $db->query("UPDATE person set firstname='$fname', secondname='$sname',
                     email='$email', city='$city', pass='$passHash' WHERE id='$id'");
    }

   header("Location: loginContr.php");
    unset($_POST["update"]);
    }
?>