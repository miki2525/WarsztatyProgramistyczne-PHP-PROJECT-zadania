<?php
session_start();
if(isset($_POST["login"]) && isset($_POST["pass"])){
    //////connect to db and check credentials////////
    ///if login and pass ok start_session() + flag is ok and show the view
    ///get object Person from DB, welcome using name
    /// select * from Osoba where login=POSTlogin AND pass=POSTpass
    if ($_POST["login"] == "user" && $_POST["pass"] == "user"){
        //////ID dla panelu admina
        $_SESSION["login"] = $_POST["login"];
        $_SESSION["pass"] = $_POST["pass"];
        $_SESSION["firstname"] = "Jacek";
        $_SESSION["surnname"] = "Kowalski";
        $_SESSION["gender"] = "Inne";
        $_SESSION["cardType"] = "Kredytowa";
        $_SESSION["cardNum"] = "4445152671891";

    }
    else{
        header("Location: index.html");
        setcookie("login", "failed", time() + 1);
    }

}
?>


<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="static/css/userPanel.css">
<script src="static/js/jquery.js"></script>
<script src="static/js/userPanel.js"> </script>

<head>
    <meta charset="UTF-8">
    <title>RegCard</title>
</head>
<body>
<header>
    <div class="row bg-secondary">
        <div class="col-11 text-center">
            <a class="text-light"><img src="static/img/logo.jpg"></a>
        </div>
        <div class="col-1 text-right" id="logout">
            <a href="logout.php?logout=true"><button>WYLOGUJ
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
            </button>
            </a>
        </div>
    </div>
</header>


<div class="container">

    <div class="row">
        <div  class="col-6 text-left"><div class="btn">Edycja danych</div></div>
        <div class="col-6 text-right"><div class="btn">Usuń konto</div></div>
    </div>

    <div class="Welcome p-4">
        <p>Witaj, <?php echo $_SESSION["firstname"]?>!</p>
        <p>Możesz tutaj sprawdzić swoje dane, edytować je lub usunąć konto.</p>
        <br>
        <div class="border border-secondary">
            <div class="row"><label class="col-6 border-right border-secondary">Imię: <?php echo $_SESSION["firstname"]?></label><label class="col-6">Nazwisko: <?php echo $_SESSION["surnname"]?></label>
            </div>
            <div class="row "><label class="col-6 border-right border-secondary">Adres e-mail: <?php echo $_SESSION["login"]?></label><label class="col-6">Płeć: <?php echo $_SESSION["gender"]?></label>
            </div>
            <div class="row"><label class="col-6 border-right border-secondary">Typ karty: <?php echo $_SESSION["cardType"]?></label><label class="col-6">Numer karty: <?php echo $_SESSION["cardNum"]?></label>
            </div>
            <div class="row"> <label class="col-8"></label><?php echo "<img src=\"static/img/american.jpg\">"?></div>
        </div>
    </div>


    <div class="0 form p-4">
        <form action="editForm.php" method="post">
            <label>Imię:</label>
            <input type="text" name="firstname" id="name" class="form-control" placeholder="Imię" value=<?php echo "\"" . $_SESSION["firstname"] . "\""?>>
            <br>
            <label>Nazwisko:</label>
            <input type="text" name="surname" id="surname" class="form-control" placeholder="Nazwisko" value=<?php echo "\"" . $_SESSION["surnname"] . "\""?>>
            <br>
            <label>Adres e-mail:</label>
            <input type="text" name="mail" id="mail" class="form-control" placeholder="Adres e-mail" value=<?php echo "\"" . $_SESSION["login"] . "\""?>>
            <br>
            <label>Hasło:</label>
            <input type="password" name="pass"  id="pass" class="form-control" placeholder="Hasło" value=<?php echo "\"" . $_SESSION["pass"] . "\""?>>
            <p style="font-size: 10px; color: forestgreen"> Hasło musi składać się z co najmniej 6 znaków, co  najmniej 1 wielkiej litery, 1 małej litery oraz cyfry.</p>
            <label>Płeć:</label>
            <select class="form-control" name="gender" id="gender">
                <option value=<?php echo "\"" . $_SESSION["gender"] . "\""?> selected disabled><?php echo $_SESSION["gender"]?></option>
                <option value="male">Mężczyzna</option>
                <option value="female">Kobieta</option>
                <option value="other">Inne</option>
            </select>
            <br>
            <label>Typ karty:</label>
            <select class="form-control" name="cardType" id="cardtype">
                <option value=<?php echo "\"" . $_SESSION["cardType"] . "\""?> selected disabled><?php echo $_SESSION["cardType"]?></option>
                <option value="Debetowa">Debetowa</option>
                <option value="Kredytowa">Kredytowa</option>
                <option value="Obciążeniowa">Obciążeniowa</option>
            </select>
            <br>
            <label>Numer karty:</label>
            <input type="text" class="form-control" name="cardNum" id="cardnum" placeholder="Numer karty" value=<?php echo "\"" . $_SESSION["cardNum"] . "\""?>>
            <br>
            <input type="submit" class="btn-success" value="Zatwierdź" id="formReg">
        </form>
    </div>

    <div class="1 form p-4">
        <p>Czy aby napewno chcesz usunąć konto? </p>
        <input type="submit" class="btn-danger" value="Usuń" id="formReg">
    </div>


</div>


<footer>
    <div class="row bg-secondary">
        <div class="col-11 text-center">
            <a class="text-light"><img src="static/img/logo.jpg"></a>
        </div>
    </div>
</footer>
</body>
</html>