<?php

class Car
{
private static $ile;

private $model, $cena, $kurs;


    public function __construct($model, $cena, $kurs)
    {
        $this->model = $model;
        $this->cena = $cena;
        $this->kurs = $kurs;
        self::$ile++;
    }


    public static function getIle()
    {
        return self::$ile;
    }


    public static function setIle($ile)
    {
        self::$ile = $ile;
    }


    public function getModel()
    {
        return $this->model;
    }


    public function setModel($model)
    {
        $this->model = $model;
    }


    public function getCena()
    {
        return $this->cena;
    }


    public function setCena($cena)
    {
        $this->cena = $cena;
    }


    public function getKurs()
    {
        return $this->kurs;
    }


    public function setKurs($kurs)
    {
        $this->kurs = $kurs;
    }

public function value(){
    return $this->cena;
}

public function __toString()
{
    return  "Cena: " . $this->cena . ", Kurs: " . $this->kurs . ", Model: " . $this->model;
}
}