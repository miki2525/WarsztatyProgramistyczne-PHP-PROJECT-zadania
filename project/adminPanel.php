<?php
if($_POST["login"] == "admin" &&
$_POST["pass"] == "admin"){
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="static/css/adminPanel.css">
<script src="static/js/jquery.js"></script>
<script src="static/js/sortElements.js"></script>
<script src="static/js/adminPanel.js"> </script>

<head>
    <meta charset="UTF-8">
    <title>RegCard</title>
</head>
    
<body class="bg-primary">
<header>
    <div class="row bg-primary">
        <div class="col-2"><img src="static/img/paddlelock.JPG" id="paddlelock"></div>
        <div class="col-8 text-center">
            <a class="text-light"><img src="static/img/logo.jpg"></a>
        </div>
        <div class="col-1 right" id="logout">
            <a href="logout.php?logout=true"><button>WYLOGUJ
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
            </button>
            </a>
        </div>
        <div class="col-1 text-right"><img src="static/img/paddlelock.JPG" id="paddlelock"></div>
    </div>
</header>


<div class="container bg-light rounded">

    
    <div class="Welcome text-center">
        <p>Witaj w panelu administratora!</p>
        <p>Możesz tu zarządzać zarejestrowanymi użykownikami,
        dodawać nowych, a także importować i eksportować pliki.</p>
    </div>
    
    <div class="row">
        <div  class="col-12 text-center "><div class="btn" id="manageUsers">Zarządzaj użytkownikami</div></div>
<!--        zaladować na wejscu baze, wyszukaj użytkownika, edytuj, usun, importuj plik, zapisz do pliku-->
    </div>

    <div class="content p-4 container">
<!--    Select * from Person load using php(link)-->
        
        <div class="row mb-3"><button class="btn-success" id="new">NOWY</button></div>
        
        <div class="row"><table class="table"><tr class="table-primary"><th>Row#</th><th>ID</th><th>Imie</th><th>Nazwisko</th><th>Email</th>
            <th>Płeć</th><th>Typ karty</th><th>Numer karty</th><th>System płatniczy</th></tr>
            <tr><td></td><td>1</td><td>Jacek</td><td>Kowalski</td><td>jacek@mail</td><td>Inne</td><td>debit</td><td>4447489013457812</td><td>MasterCard</td></tr><tr><td></td><td>2</td><td>Jacek</td><td>Kowalski</td><td>jacek2@mail</td><td>Inne</td><td>debit</td><td>4447489013457812</td><td>MasterCard</td></tr></table></div>
        
        <div class="row mt-5">
            <div class="col-6"><button type="button" class="col-6 btn-info" id="edit">EDYTUJ</button></div>
            <div class="col-6 text-right"><button type="button" class="col-6 btn-danger ml-5" id="delete">USUN</button></div>
        </div>
        
        <div class="row mt-5">
            <form>
                <div><label class="ml-5">Załaduj plik z danymi</label><input type="file" class="ml-2 mb-3" name="upload" id="upload">
                    <input class="mt-2 btn btn-secondary" type="submit" value="Wyślij plik" name="wyslij" id="send">
                </div>
            </form>
        </div>
        
        <div class="row mt-5">
            <a class="ml-5 col-11 text-right" href="#">
                <button class="btn btn-success">Pobierz plik z danymi</button>
            </a>
        </div>
        
    </div>
    
    <div class="editForm">
        <div class="0 form p-4">
        <form action="editForm.php" method="post">
            <label>Imię:</label>
            <input type="text" name="firstname" id="name" class="form-control" placeholder="Imię">
            <br>
            <label>Nazwisko:</label>
            <input type="text" name="surname" id="surname" class="form-control" placeholder="Nazwisko">
            <br>
            <label>Adres e-mail:</label>
            <input type="text" name="mail" id="mail" class="form-control" placeholder="Adres e-mail">
            <br>
            <label>Hasło:</label>
            <input type="password" name="pass"  id="pass" class="form-control" placeholder="Hasło">
            <p style="font-size: 10px; color: forestgreen"> Hasło musi składać się z co najmniej 6 znaków, co  najmniej 1 wielkiej litery, 1 małej litery oraz cyfry.</p>
            <label>Płeć:</label>
            <select class="form-control" name="gender" id="gender">
                <option selected disabled></option>
                <option value="male">Mężczyzna</option>
                <option value="female">Kobieta</option>
                <option value="other">Inne</option>
            </select>
            <br>
            <label>Typ karty:</label>
            <select class="form-control" name="cardType" id="cardtype">
                <option selected disabled></option>
                <option value="Debetowa">Debetowa</option>
                <option value="Kredytowa">Kredytowa</option>
                <option value="Obciążeniowa">Obciążeniowa</option>
            </select>
            <br>
            <label>Numer karty:</label>
            <input type="text" class="form-control" name="cardNum" id="cardnum" placeholder="Numer karty">
            <br>
            <input type="submit" class="btn-success" value="Zatwierdź" id="formReg">
        </form>
    </div>
    </div>

</div>
</body>
</html>
<?php
}
else{
    echo "Nieprawidlowe dane <a href=\"adminlog.html\"> Wroc </a>";
}