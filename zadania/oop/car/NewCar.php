<?php
include("Car.php");

trait ShowParent{
    public function getParent(){
        return get_parent_class($this);
    }
}



class NewCar extends Car
{
    use ShowParent;
private $alarm, $radio, $climatronic;


    public function __construct($model, $cena, $kurs,$alarm, $radio, $climatronic)
    {
        parent::__construct($model, $cena, $kurs);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->climatronic = $climatronic;
    }

    public function value()
    {
        if ($this->getAlarm() == true){
            $this->setCena(0.05 * $this->getCena() + $this->getCena());
        }
        if ($this->radio == true){
            $this->setCena(0.075 * $this->getCena() + $this->getCena());
        }
        if ($this->climatronic == true){
            $this->setCena(0.1 * $this->getCena() + $this->getCena());
        }
    }


    public function getAlarm()
    {
        return $this->alarm;
    }

    public function setAlarm($alarm)
    {
        $this->alarm = $alarm;
    }

    public function getRadio()
    {
        return $this->radio;
    }

    public function setRadio($radio)
    {
        $this->radio = $radio;
    }

    public function getClimatronic()
    {
        return $this->climatronic;
    }

    public function setClimatronic($climatronic)
    {
        $this->climatronic = $climatronic;
    }

    public function __toString()
    {
        return parent::__toString() . ", Alarm: " . $this->alarm .
            ", Radio: " . $this->radio . ", Climatronic: " . $this->climatronic;
    }

}
$newCar = new NewCar("Lancer", 50000, 4.55, true, true, true);
echo "Rodzicem \$newCar jest klasa: " .$newCar->getParent();
?>


