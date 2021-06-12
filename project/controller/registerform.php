<?php
include ("../util/queries.php");
include ("../util/validateform.php");
include ("../util/paymentnetwork.php");
include ("../model/User.php");

$servername = "localhost";
$username = "guest";
$password = "hasloGUEST";
$dbname = "wprg";



if(isset($_POST["mail"])) {

    if (validate($_POST)) {
        $mysqli = new mysqli($servername, $username, $password, $dbname);
        $result = $mysqli->query(Queries::checkifexist($_POST["mail"]));
        ////check if login already exist

        if ($result->num_rows == 0) {
            $paymentnet = checkpaymentNetwork($_POST["cardNum"]);
            $user = new User($_POST["firstname"], $_POST["surname"], $_POST["mail"], $_POST["gender"],
            $_POST["cardType"], $_POST["cardNum"],$paymentnet, $_POST["pass"]);

            $mysqli->query(Queries::saveUser($user->getFirstname(), $user->getSurname(), $user->getEmail(), $user->getGender(),
                $user->getCardType(), $user->getCardNum(), $user->getPaymentNetwork(), $user->getPassword()));
            $mysqli->close();
    }

        /// mail potwierdzający

        else {
            $mysqli->close();
            echo "Podany adres e-mail jest już zarejestrowany. <a href='../view/register.html'>WROC.</a>";
        }
    } else {
        $mysqli->close();
        echo "Nieprawidłowe dane <a href='../view/index.html'>WROC.</a>";
    }
}
?>
