<?php
include("Invoice.php");

use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{

    public function testAmount()
    {
        $obj1 = new Invoice(1, "ABC", 10, 1);
        $obj2 = new Invoice(2, "CBA", -1, -5);
        $obj3 = new Invoice(3, "BCA", 12, 0);
        $obj4 = new Invoice(4, "BAC", 0, 133);

        $this->assertEquals(10, $obj1->Amount());
        $this->assertEquals(0, $obj2->Amount());
        $this->assertEquals(0, $obj3->Amount());
        $this->assertEquals(0, $obj4->Amount());


    }
}
