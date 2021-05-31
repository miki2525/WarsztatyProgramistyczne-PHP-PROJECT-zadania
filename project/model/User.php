<?php

class User{

    private $id;
    private $firstname;
    private $surname;
    private $email;
    private $gender;
    private $cardType;
    private $cardNum;
    private $paymentNetwork;
    private $password;


    public function __construct($firstname, $surname, $email, $gender, $cardType, $cardNum, $paymentNetwork, $password)
    {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->gender = $gender;
        $this->cardType = $cardType;
        $this->cardNum = $cardNum;
        $this->paymentNetwork = $paymentNetwork;
        $this->password = $password;
    }



    public function getId()
    {
        return $this->id;
    }




    public function getFirstname()
    {
        return $this->firstname;
    }



    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }



    public function getSurname()
    {
        return $this->surname;
    }



    public function setSurname($surname)
    {
        $this->surname = $surname;
    }



    public function getEmail()
    {
        return $this->email;
    }



    public function setEmail($email)
    {
        $this->email = $email;
    }



    public function getGender()
    {
        return $this->gender;
    }



    public function setGender($gender)
    {
        $this->gender = $gender;
    }



    public function getCardType()
    {
        return $this->cardType;
    }



    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }


    public function getCardNum()
    {
        return $this->cardNum;
    }


    public function setCardNum($cardNum)
    {
        $this->cardNum = $cardNum;
    }

    public function getPaymentNetwork()
    {
        return $this->paymentNetwork;
    }


    public function setPaymentNetwork($paymentNetwork)
    {
        $this->PaymentNetwork = paymentNetwork;
    }


    public function getPassword()
{
    return $this->password;
}


    public function setPassword($password)
{
    $this->password = $password;
}






}