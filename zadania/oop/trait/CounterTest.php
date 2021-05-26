<?php
include ("Counter.php");

use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{

    public function testInc()
    {
        $a = new A();
        $b = new B();
        $a->inc();$a->inc();$a->inc();$a->inc();
        $b->inc();
        $this->expectOutputString("12341");

    }
}
