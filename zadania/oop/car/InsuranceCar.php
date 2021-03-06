<?php

include ("NewCar.php");

class InsuranceCar extends NewCar
{
 private $firstOwner, $years;

    public function __construct($model, $cena, $kurs, $alarm, $radio, $climatronic, $firstOwner, $years)
    {
        parent::__construct($model, $cena, $kurs, $alarm, $radio, $climatronic);
        $this->firstOwner = $firstOwner;
        $this->years = $years;
    }

    public function getFirstOwner()
    {
        return $this->firstOwner;
    }

    public function setFirstOwner($firstOwner)
    {
        $this->firstOwner = $firstOwner;
    }

    public function getYears()
    {
        return $this->years;
    }

    public function setYears($years)
    {
        $this->years = $years;
    }

    public function value()
    {
        $this->setCena($this->getCena() - (0.01 * $this->years));
        if($this->firstOwner == true){
        $this->setCena($this->getCena() - (0.05 * $this->getCena()));
            }
    }

    public function __toString()
    {
        return parent::__toString(); // TODO: Change the autogenerated stub
    }


}

