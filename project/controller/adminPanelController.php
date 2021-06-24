<?php
include("../model/User.php");
include ("../util/mysqlProperties.php");
include("../util/queries.php");
include ("../util/paymentnetwork.php");

session_start();


if (isset($_POST["delete"])){
    $mysqli = new mysqli(mysqlProperties::getServerName(), mysqlProperties::getUser(),
    mysqlProperties::getPassword(), mysqlProperties::getDBname());
    if ($mysqli->connect_errno) {
        echo $mysqli->connect_error;
    } else {

        $mysqli->query(Queries::deleteUser($_POST["delete"]));
        unset($_POST["delete"]);
        header("Location: adminPanelController.php");
        setcookie("usunieto", "true", time() + 2);

        if ($mysqli->errno) {
            unset($_POST["delete"]);
            echo $mysqli->error;
        }
        $mysqli->close();
    }
}

if(isset($_POST["showFile"])){
    $fileName = $_FILES["upload"]["tmp_name"];
    if ($_FILES["upload"]["size"] > 0) {

        $file = fopen($fileName, "r");
        $userList = array();
        while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {

            $user = new User($column[0], $column[1], $column[2], $column[3],
                $column[4], $column[5], $column[6], $column[7]);

            array_push($userList, $user);
        }
        $_SESSION["upload"] = "true";
        $_SESSION["userlist"] = $userList;
    }
}

if(isset($_POST["sendFileToDb"])){
    $userList = $_SESSION["userlist"];
    $mysqli = new mysqli(mysqlProperties::getServerName(), mysqlProperties::getUser(),
        mysqlProperties::getPassword(), mysqlProperties::getDBname());
    if ($mysqli->connect_errno) {
        echo $mysqli->connect_error;
    } else {


    foreach ($userList as $user){
            $mysqli->query(Queries::saveUser($user->getFirstname(), $user->getSurname(), $user->getEmail(),
            $user->getGender(), $user->getCardType(), $user->getCardNum(), $user->getPaymentNetwork(), $user->getPassword()));
            if ($mysqli->errno) {
                unset($_POST["sendFileToDb"]);
                echo $mysqli->error;
            }
        }
    }
    $mysqli->close();
    unset($_SESSION["upload"]);
    unset($_SESSION["userlist"]);
    unset($_POST["sendFileToDb"]);
    unset($_POST["showFile"]);
    header("Location: adminPanelController.php");
    setcookie("zapisano", "true", time() + 2);
}

if(isset($_GET["path"])){
    $fileName = "../static/" . $_GET["path"];
    $fp = fopen($fileName, "w");
    $mysqli = new mysqli(mysqlProperties::getServerName(), mysqlProperties::getUser(),
        mysqlProperties::getPassword(), mysqlProperties::getDBname());
    $getAll = $mysqli->query(Queries::$selectAll);
    fprintf($fp, chr(0xEF).chr(0xBB).chr(0xBF));
    while($row = $getAll->fetch_assoc()){
        fputcsv($fp, $row, ";");

    }
    fclose($fp);
    $mysqli->close();
    header('Content-Type: application/octet-stream');
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
    header('Content-Length: ' . filesize($fileName));
    readfile($fileName);
    unlink($fileName);
    unset($_GET["path"]);
}

if (isset($_SESSION["login"])) {
    include("../view/adminPanel.php");
        }

        elseif ($_POST["login"] == "admin" &&
            $_POST["pass"] == "admin") {
            unset($_POST["login"]);
            unset($_POST["pass"]);
            $_SESSION["login"] = "admin";
            include("../view/adminPanel.php");

        }

        else {
            session_destroy();
            echo "Nieprawidlowe dane <a href='../view/adminlog.html'> Wroc </a>";
        }

?>