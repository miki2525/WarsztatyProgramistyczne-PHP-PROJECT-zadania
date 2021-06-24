
<html>
<?php if (!empty($_COOKIE["failed"])) {
    echo "<h1>Niepoprawne dane logowania</h1>";
}
elseif (!empty($_COOKIE["delete"])) {
    echo "<h1>Usunięto konto</h1>";
}
elseif (!empty($_COOKIE["logout"])) {
echo "<h1>Wylogowano pomyślnie</h1>";
}
elseif (!empty($_COOKIE["reset"])) {
    echo "<h1>Zresetowano hasło. Nowe hasło to: ".$_COOKIE["reset"]." Zmień hasło po zalogowaniu.</h1>";
}?>
<body>
<form action="loginContr.php" method="post" style="border: 3px deeppink dashed">
    <fieldset>ZALOGUJ SIĘ!</fieldset>
    <label>Login(e-mail): </label><input type="text" name="login" required>
    <label>Hasło: </label><input type="password" name="pass">
    <input type="submit" value="zaloguj">
</form>
<p>Zapomnialeś hasła? <a href="loginContr.php?reset=true"><button>ZRESETUJ HASŁO</button></a></p>
<p>Nie masz konta? <a href="registerForm.php"><button>ZAREJESTRUJ SIĘ</button></a></p>
</body>
</html>


