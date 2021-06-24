<?php
session_start();
if (isset($_GET["logout"])){
unset($_SESSION["login"]);
session_destroy();
unset($_POST["login"]);
unset($_POST["pass"]);
unset($_SESSION["login"]);
header("Location: ../view/index.html");
setcookie("logout", "success", time() + 5);
}
?>