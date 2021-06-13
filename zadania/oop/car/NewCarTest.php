<?php


use PHPUnit\Framework\TestCase;

class NewCarTest extends TestCase
{
    public function valueTest(){
        $car2 = new NewCar("Lancer", 50000, 4.55, true, true, true);
        $car2->value();
        $this->assertEquals(62081, $car2->getCena());
    }

    public function getParentTest()
    {

        $car2 = new NewCar("Lancer", 50000, 4.55, true, true, true);
        $this->assertEquals("Car", $car2->getParent());
    }


}
