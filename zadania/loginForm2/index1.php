<?php
session_start();
if (!isset($_SESSION["login"]) && !isset($_SESSION["haslo"])){
}
?>


<!DOCTYPE html>
<html>
<body>

<form action="index2.php", method="post">
    <label>login(adres e-mail):</label><input type="email" name="mail" required>
    <label>haslo:</label><input type="text" name="haslo" required pattern="^(?=.*[A-Z])(?=.*[0-9]).{6,}$">
    <br><br>
    <input type="submit">
</form>

<br>
<p style="font-size: 11px">haslo musi skladac sie z co najmniej 6 znakow, co  najmniej 1 wielkiej litery oraz cyfry.</p>

</body>
</html>
