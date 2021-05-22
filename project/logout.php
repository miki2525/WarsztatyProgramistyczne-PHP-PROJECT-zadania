<?php
session_start();
if ($_GET["logout"]){
session_unset();
session_destroy();
header("Location: index.html");
setcookie("logout", "success", time() + 2);
}
?>