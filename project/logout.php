<?php
session_start();
if (isset($_GET["logout"])){
session_unset();
session_destroy();
header("Location: index.html");
setcookie("logout", "success", time() + 1);
}