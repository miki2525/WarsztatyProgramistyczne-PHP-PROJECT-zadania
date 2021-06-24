<?php

session_start();
$password = 'H@SLOtajne54';
$username = "s20157";

if (isset($_POST["delete"])){
    $id = $_POST["delete"];
    $db = new PDO("pgsql:host=localhost;port=5434", $username, $password);
    $statement = $db->prepare("DELETE from customers WHERE id='$id'");
    $statement->execute();
    header("Location: index.php");
    unset($_POST["delete"]);
    die();
}

elseif (isset($_POST["edit"])){
    $_SESSION["id"] = $_POST["edit"];
    $id = $_POST["edit"];
    $db = new PDO("pgsql:host=localhost;port=5434", $username, $password);
    $statement = $db->query("SELECT *    from customers WHERE id='$id'");
    $user=$statement->fetch();

if (!empty($user)){
    ?>
    <html>
    <body>
    <form action="#", method="post">
        <legend>EDYTUJ DANE</legend>
        <label>Imie: </label><input type="text" name="fname" value="<?php echo $user['firstname']?>" required>
        <label>Nazwisko: </label><input type="text" name="sname" value="<?php echo $user['secondname']?>" required>
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
    $id = $_SESSION["id"];
    $db->query("UPDATE customers set firstname='$fname', secondname='$sname' WHERE id='$id'");
    echo "zauktalizaowano";
    echo "<a href='index.php'> POWRÓT</a>";
    unset($_POST["update"]);
    }
?>