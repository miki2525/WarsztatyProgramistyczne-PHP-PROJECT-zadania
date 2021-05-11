<?php
session_start();
if (!isset($_SESSION["login"]) && !isset($_SESSION["haslo"])){
    $_SESSION["login"] = "user";
    $_SESSION["haslo"] = "pass";
}
?>


<!DOCTYPE html>
<html>
<body>

<form action="index2.php", method="post">
    <label>login:</label><input type="text" name="login">
    <label>haslo:</label><input type="text" name="haslo">
    <input type="submit">
</form>

<br>
<label style="font-size: 11px">login: user, haslo: pass</label>

</body>
</html>
