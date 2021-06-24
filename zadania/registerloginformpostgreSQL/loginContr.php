<?php

$password = 'H@SLOtajne54';
$username = "s20157";

session_start();


if (isset($_GET["reset"])) {
    unset($_SESSION["logged"]);
    session_destroy();
    ?>
    <html>
    <body>
    <form action="resetPass.php" method="post">
        <fieldset>Podaj adres email oraz miasto</fieldset>
        <input type="text" name="email" required>
        <input type="text" name="city" required>
        <input type="submit" value="resetuj">
    </form>
    </body>
    </html>
<?php }
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: loginform.php");
    setcookie("logout", "true", time() + 2);
}

if (!empty($_POST["login"]) && !empty($_POST["pass"])){

    $db = new PDO("pgsql:host=localhost;port=5434", $username, $password);

    $login = $_POST["login"];
    $pass = $_POST["pass"];


    $query = $db->query("SELECT pass FROM person WHERE email='$login';");
    $result = $query->fetch();

    if ($result[0]!= ""){
        if (password_verify($pass, $result[0])){
            $_SESSION["logged"] = "ok";
        }
        else {
            header("Location: loginform.php");
            setcookie("failed", "true", time() + 2);
            unset($_POST);

        }
    }
    else{
        header("Location: loginform.php");
        setcookie("failed", "true", time() + 2);
        unset($_POST);
    }
    if(!empty($_SESSION["logged"])){
        $query = $db->query("SELECT * FROM person WHERE email='$login';");
        $person = $query->fetch();
        $_SESSION["person"] = $person;
    }
}

if (isset($_SESSION["logged"])){
    if (!empty($_SESSION["person"])){
        $mail = $_SESSION["person"]["email"];
        $db = new PDO("pgsql:host=localhost;port=5434", $username, $password);
        $query = $db->query("SELECT * FROM person WHERE email='$mail';");
        $person = $query->fetch();
      ?>
<html>
<body>
        <a href="loginContr.php?logout=true"><button>WYLOGUJ</button></a>
        <table style="border: deeppink 5px solid">
        <tr>
            <th style="border: black 5px solid">firstname</th>
            <th style="border: black 5px solid">secondname</th>
            <th style="border: black 5px solid">email</th>
            <th style="border: black 5px solid">city</th>
        </tr>
        <tr>
            <td style="border: black 1px solid"><?php echo $person['firstname'];?></td>
            <td style="border: black 1px solid"><?php echo $person['secondname'];?></td>
            <td style="border: black 1px solid"><?php echo $person['email'];?></td>
            <td style="border: black 1px solid"><?php echo $person['city'];?></td>
            <td style="border: black 1px solid"><form method="post", action="process.php">
                    <input type="submit" name="delete" class="delete" value="<?php echo $person['id']?>"><label>USUN</label>
                    <input type="submit" name="edit" class="edit" value="<?php echo $person['id'];?>"><label>EDYTUJ</label>
                </form></td>
        </tr> </table>
</body>
</html>
<?php }}?>
