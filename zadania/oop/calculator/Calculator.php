<?php

class Calculator{
    public $a;
    public $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function add(){
        return $this->a + $this->b;
    }

    public function substract(){
        return $this->a - $this->b;
    }

    public function multiply(){
        return $this->a * $this->b;
    }

    public function divide(){
        if($this->b == 0){
            return "nie dzielimy przez 0!";
        }
        return $this->a / $this->b;
    }
}

$calculator = new Calculator(4, 4);
echo "Wynik mnozenia to:" . $calculator->multiply();
echo "\nWynik dzielenia to:" . $calculator->divide();
echo "\nWynik odejmowania to:" . $calculator->substract();
echo "\nWynik dodawania to:" . $calculator->add();
?>