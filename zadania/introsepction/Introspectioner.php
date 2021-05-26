<?php

    class A
    {
        public $foo = "foo";
        public $bar = "bar";
        public $baz = 17.0;

        function firstFunction(){ }

        function secondFunction(){ }
    }
    class B extends A {
        public $quux = false;
        function thirdFunction() { }
    }
        class C extends B { }


class Introspectioner{

    public static function getCallableMethods($object){
        return get_class_methods($object);
    }
    public static function getLineage($object){
        $class = new ReflectionClass($object);
        $line = Array();
        while ($class = $class->getParentClass()){
            array_unshift($line, $class->getName());
        }
        return $line;
    }
    public static function getChildClasses($object){
            $line = array();
            $super = get_class($object);

            foreach (get_declared_classes() as $class){
             if (is_subclass_of($class, $super)){
                 array_push($line, $class);
             }
         }
            return $line;
    }
    public static function getProperties($object){
        $class = new ReflectionClass($object);
        $properties = array();
        foreach ($class->getProperties() as $property){
        $properties[] = $property->getName();
        }
        return $properties;
    }
    public static function printObjectInfo($object)
    {
        $f = fopen("classInfo.html", "a");
        fwrite($f, "<!DOCTYPE html><html><body><h1>Informacja o obiekcie klasy ". get_class($object) ."</h1><div>");
        $info =
                "<h3>getCallableMethods</h3>".
                print_r(Introspectioner::getCallableMethods($object), true).

                "<h3>getLineage</h3>".
                print_r(Introspectioner::getLineage($object), true).

                "<h3>getChildClasses</h3>".
                print_r(Introspectioner::getChildClasses($object), true).

                "<h3>getProperties</h3>".
                print_r(Introspectioner::getProperties($object), true).
                "<br>";
        fwrite($f, $info);
        fwrite($f, "</div></body></html>");
    }

}
 $a = new A();
        $a->foo = "sylvie";
        $a->bar = 23;
        $b = new B();
        $b->foo = "bruno";
        $b->quux = true;
        $c = new C();
        Introspectioner::printObjectInfo($a);
        Introspectioner::printObjectInfo($b);
        Introspectioner::printObjectInfo($c);

?>