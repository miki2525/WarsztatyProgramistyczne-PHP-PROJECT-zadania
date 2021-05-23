<?php
include("Calculator.php");
use PHPUnit\Framework\TestCase;


class CalculatorTest extends TestCase
{

    public function testSubstract(){
            $calculator = new Calculator(10, 5);
            $this->assertEquals(5, $calculator->substract());
    }
    public function testAdd()
    {
        $calculator = new Calculator(10, 5);
        $this->assertEquals(15, $calculator->add());
    }

    public function testMultiply()
    {
        $calculator = new Calculator(10, 5);
        $this->assertEquals(50, $calculator->multiply());
    }

    public function testDivide()
    {
        $calculator = new Calculator(10, 5);
        $this->assertEquals(2, $calculator->divide());
    }
}
