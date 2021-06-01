<?php
include("../model/User.php");
session_start();



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
        $_SESSION["upload"] = $userList;
    }
}

if(isset($_POST["sendFileToDb"])){
    $userList = $_SESSION["upload"];
    /////save do TO DB if success echo cookie success
    unset($_SESSION["upload"]);
    unset($_POST["sendFileToDb"]);
    unset($_POST["showFile"]);
    header("Location: adminPanelController.php");
    setcookie("zapisano", "true", time() + 2);
}

if(isset($_GET["path"])){
    $fileName = "../static/" . $_GET["path"];
    ////fopen and wrtie sqlresult to file if !emptysqlresult
    header('Content-Type: application/octet-stream');
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
    header('Content-Length: ' . filesize($fileName));

    readfile($fileName);
//    unlink($fileName); delete the file after download
    unset($_GET["path"]);
}

        if (!empty($_SESSION["login"])) {
            include("../view/adminPanel.php");
        }

        elseif ($_POST["login"] == "admin" &&
            $_POST["pass"] == "admin") {

            $_SESSION["login"] = "admin";
            include("../view/adminPanel.php");
        }

        else {
            session_destroy();
            echo "Nieprawidlowe dane <a href='../view/adminlog.html'> Wroc </a>";
        }

?>