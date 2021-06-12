<?php
include("../model/User.php");
include("../util/queries.php");
session_start();

if(!empty($_SESSION["email"]) &&
!empty($_SESSION["pass"])){
//just show the panel
}

elseif (!empty($_POST["login"]) &&
!empty($_POST["pass"])){

////authorization with mysql(if ok, proceed) else setookie
$_SESSION["firstname"] = "user"; /////normally from Session = user from db
$_SESSION["email"] = "user"; ////// same above
$_SESSION["cardType"] = "user"; ////// same above
$_SESSION["surnname"] = "user"; ////// same above
$_SESSION["gender"] = "user"; ////// same above
$_SESSION["cardNum"] = "user"; ////// same above
$_SESSION["pass"] = "user"; ////// same above

}
else{
session_destroy();
header("Location: index.html");
setcookie("login", "false", time() + 3);
}
?>