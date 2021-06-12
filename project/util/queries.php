<?php

class Queries{

    public static $selectAll = "SELECT * FROM users;";





    public static function saveUser($fname, $sname, $mail, $gender, $cardt, $cardn, $paynet, $pass){

        return "INSERT INTO users(firstname, surname, email, gender, 
                  cardtype, cardnum, paymentnetwork, password) values('$fname', '$sname', '$mail',
                                                                      '$gender', '$cardt', '$cardn',
                                                                      '$paynet', '$pass');";
    }

    public static function authorization($login, $password){
        return "SELECT * FROM users WHERE email='$login' AND password='$password';";
    }

    public static function checkifexist($email){
    return "SELECT email FROM users WHERE email='$email';";
}


}