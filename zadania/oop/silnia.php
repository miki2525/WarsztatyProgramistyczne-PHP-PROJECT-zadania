<?php

class Factorial{
    private $n;

    public function __construct($n){
    if((int)$n == $n)
    {
        $this->n = $n;
    }
    else{
        echo "Nie liczba lub brak argumentu";
    }
    }

    public function result(){
        $factorial = 1;
        for ($i = 1; $i <= $this->n; $i++){
            $factorial *= $i;
        }
        return $factorial;
    }
}
$a = new Factorial(4);
echo $a->result();

?>


