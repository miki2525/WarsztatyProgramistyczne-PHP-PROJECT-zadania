<?php

class Student{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public static function withID($name, $ID){
        $createObj = new Student($name);
        $createObj->ID = $ID;
        return $createObj;
    }

    public static function withSecondName($name, $secondName){
        $objectNames = new Student($name);
        $objectNames->secondName = $secondName;
        return $objectNames;
    }

}
$obj1 = Student::withSecondName("Adam", "Tomasz");
$obj2 = Student::withID("Marek", 1);
$obj3 = Student::withID("Wojtas", 2);
$obj4 = Student::withSecondName("Jeremiasz", "John");

echo "obj1 ma drugie imie: " . $obj1->secondName;
echo "\nobj2 ma ID: " . $obj2->ID;
echo "\nobj3 ma ID: " . $obj3->ID;
echo "\nobj4 ma drugie imie: " . $obj4->secondName;


?>
