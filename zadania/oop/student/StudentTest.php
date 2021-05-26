<?php
include("Student.php");

use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{

    public function testWithSecondName()
    {
        $obj1 = Student::withSecondName("Adam", "Tomasz");
        $obj4 = Student::withSecondName("Jeremiasz", "John");

        $this->assertEquals("Tomasz", $obj1->secondName);
        $this->assertEquals("John", $obj4->secondName);
    }

    public function testWithID()
    {
        $obj2 = Student::withID("Marek", 1);
        $obj3 = Student::withID("Wojtas", 2);

        $this->assertEquals(1, $obj2->ID);
        $this->assertEquals(2, $obj3->ID);
    }
}
