<?php
session_start();
if (isset($_GET["logout"])){
session_destroy();
header("Location: ../view/index.html");
setcookie("logout", "success", time() + 5);
}
?>