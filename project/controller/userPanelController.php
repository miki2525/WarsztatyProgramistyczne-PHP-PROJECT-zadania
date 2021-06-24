<?php
include("../model/User.php");
include ("../util/mysqlProperties.php");
include("../util/queries.php");
session_start();


if(!empty($_SESSION["login"])){
if (!empty($_POST["delete"])){

    $mysqli = new mysqli(mysqlProperties::getServerName(), mysqlProperties::getUser(),
        mysqlProperties::getPassword(), mysqlProperties::getDBname());

    $mysqli->query(Queries::deleteUser($_SESSION["id"]));

    session_destroy();
    header("Location: index.html");
    setcookie("deleted", "success", time() + 5);
    unset($_POST["delete"]);
}

}

elseif (!empty($_POST["login"]) &&
!empty($_POST["pass"])) {
    $login = $_POST["login"];
    $pass = $_POST["pass"];
    $mysqli = new mysqli(mysqlProperties::getServerName(), mysqlProperties::getUser(),
        mysqlProperties::getPassword(), mysqlProperties::getDBname());

    $checkUser = $mysqli->query(Queries::authorization($login, $pass));

    if ($checkUser->num_rows == 1) {
        $getUser = $checkUser->fetch_assoc();
        $_SESSION["firstname"] = $getUser["firstname"];
        $_SESSION["surname"] = $getUser["surname"];
        $_SESSION["login"] = $getUser["email"];
        $_SESSION["gender"] = $getUser["gender"];
        $_SESSION["cardtype"] = $getUser["cardtype"];
        $_SESSION["cardnum"] = $getUser["cardnum"];
        $_SESSION["paymentnetwork"] = $getUser["paymentnetwork"];
        $_SESSION["pass"] = $getUser["password"];
        $_SESSION["id"] = $getUser["id"];
        unset($_POST["login"]);
        unset($_POST["pass"]);
    }
else{
        session_destroy();
        header("Location: index.html");
        setcookie("login", "false", time() + 3);
    }
}
else{
    session_destroy();
    header("Location: index.html");
    setcookie("login", "false", time() + 3);
}
?>