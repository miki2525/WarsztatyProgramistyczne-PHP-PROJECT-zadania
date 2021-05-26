<?php

trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World';
    }
}

trait A {
    public function smallTalk() {
        echo 'a';
    }
    public function bigTalk() {
        echo 'A';
    }
}

trait B {
    public function smallTalk() {
        echo 'b';
    }
    public function bigTalk() {
        echo 'B';
    }
}

class Guy
{

    use Hello, World;
    use A, B{
        A::smallTalk insteadof B;
        A::bigTalk insteadof B;
        B::smallTalk as smallTalkB;
        B::bigTalk as bigTalkB;
    }


}
$guy = new Guy();
$guy->sayHello();$guy->sayWorld();
$guy->smallTalk();$guy->bigTalk();
$guy->smallTalkB();$guy->bigTalkB();
?>