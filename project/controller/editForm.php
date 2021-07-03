<?php
include("../model/User.php");
include("../util/mysqlProperties.php");
include("../util/queries.php");
include("../util/paymentnetwork.php");
include("../util/validateform.php");

session_start();


///////for newUsers created by admin
if(isset($_POST) && isset($_POST["id"]) && $_SESSION["login"] == "admin") {

    if (validate($_POST)) {

        $mysqli = new mysqli(mysqlProperties::getServerName(), mysqlProperties::getUser(),
            mysqlProperties::getPassword(), mysqlProperties::getDBname());
        $result = $mysqli->query(Queries::checkifexist($_POST["mail"]));
        ////check if login already exist

        if ($result->num_rows == 0) {
            $paymentnet = checkpaymentNetwork($_POST["cardNum"]);
            $user = new User($_POST["firstname"], $_POST["surname"], $_POST["mail"], $_POST["gender"],
                $_POST["cardType"], $_POST["cardNum"], $paymentnet, $_POST["pass"]);

            $mysqli->query(Queries::saveUser($user->getFirstname(), $user->getSurname(), $user->getEmail(), $user->getGender(),
                $user->getCardType(), $user->getCardNum(), $user->getPaymentNetwork(), $user->getPassword()));
            if ($mysqli->errno){
                echo $mysqli->error;
            $mysqli->close();
            }
            else{
            $mysqli->close();
            header("Location: adminPanelController.php");
            setcookie("zapisano", "true", time() + 2);
            unset($_POST);
            }
        } /// mail potwierdzający

        else {
            $mysqli->close();
            echo "Podany adres e-mail jest już zarejestrowany. <a href='adminPanelController.php'>WROC.</a>";
        }
    } else {
        echo "Nieprawidłowe dane <a href='adminPanelController.php'>WROC.</a>";
    }
}

//////////Users to be updated
elseif(isset($_POST) && isset($_SESSION["login"])
    && !empty($_POST["id"]) || !empty(($_SESSION["id"]))){

    if (validate($_POST)) {
        $_POST["paymentnetwork"] = checkpaymentNetwork($_POST["cardNum"]);

        $mysqli = new mysqli(mysqlProperties::getServerName(), mysqlProperties::getUser(),
            mysqlProperties::getPassword(), mysqlProperties::getDBname());


        if (!empty($_POST["id"])){      ////admin

            $mysqli->query(Queries::updateUser($_POST["id"], $_POST["firstname"],
                $_POST["surname"], $_POST["mail"], $_POST["gender"], $_POST["cardType"],
                $_POST["cardNum"], $_POST["paymentnetwork"], $_POST["pass"]));
            $mysqli->close();
            unset($_POST);
            header("Location: adminPanelController.php");
            setcookie("zapisano", "true", time() + 2);
        }
        else{                           ////user

            $mysqli->query(Queries::updateUser($_SESSION["id"], $_POST["firstname"],
                $_POST["surname"], $_POST["mail"], $_POST["gender"], $_POST["cardType"],
                $_POST["cardNum"], $_POST["paymentnetwork"], $_POST["pass"]));

            if ($mysqli->errno) {
                      echo "Nie udało się zaktualizować danych " . $mysqli->error;
                      $mysqli->close();
                  }

            $mysqli->close();
            $_SESSION["firstname"] = $_POST["firstname"];
            $_SESSION["surname"] = $_POST["surname"];
            $_SESSION["login"] = $_POST["mail"];
            $_SESSION["gender"] = $_POST["gender"];
            $_SESSION["cardtype"] = $_POST["cardType"];
            $_SESSION["cardnum"] = $_POST["cardNum"];
            $_SESSION["paymentnetwork"] = $_POST["paymentnetwork"];
            $_SESSION["pass"] = $_POST["pass"];
            header("Location: ../view/userPanel.php");
            unset($_POST);
            }

    }else {
        if ($_SESSION["login"] == "admin") {
            unset($_POST);
            echo "niepoprawne dane, <a href='../controller/adminPanelController.php'>WRÓĆ</a>";
        }else{
            unset($_POST);
            echo "niepoprawne dane, <a href='../view/userPanel.php'>WRÓĆ</a>";
        }
    }
}
else{unset($_POST);
    echo "Błąd edycji";
}