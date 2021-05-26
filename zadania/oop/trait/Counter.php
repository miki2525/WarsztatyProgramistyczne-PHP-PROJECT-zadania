<?php


trait Counter
{

    function inc(){
        static $c = 0;
        $c++;
        echo $c;
    }
}


class A{
    use Counter;
}

class B{
    use Counter;
}

$a = new A();
$b = new B();
echo "inc() z A: ";
echo $a->inc();
echo "\ninc() z A: ";
echo $a->inc();
echo "\ninc() z A: ";
echo $a->inc();
echo "\ninc() z A: ";
echo $a->inc();
echo "\ninc() z B: ";
echo $b->inc();
echo "\ninc() z B: ";
echo $b->inc();
