<?php

class User{

    private $id;
    private $firstname;
    private $surname;
    private $email;
    private $gender;
    private $cardType;
    private $cardNum;
    private $PaymentNetwork;

    public function __construct($firstname, $surname, $email, $gender, $cardType, $cardNum, $PaymentNetwork)
    {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->gender = $gender;
        $this->cardType = $cardType;
        $this->cardNum = $cardNum;
        $this->PaymentNetwork = $PaymentNetwork;
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
        return $this->PaymentNetwork;
    }


    public function setPaymentNetwork($PaymentNetwork)
    {
        $this->PaymentNetwork = $PaymentNetwork;
    }




}