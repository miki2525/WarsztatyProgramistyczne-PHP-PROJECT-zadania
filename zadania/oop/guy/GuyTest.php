<?php
include ("Guy.php");


use PHPUnit\Framework\TestCase;

class GuyTest extends TestCase
{

    public function testSayWorld()
    {
        $guy = new Guy();
        $this->expectOutputString("World");
        $guy->sayWorld();
    }

    public function testSayHello()
    {
        $guy = new Guy();
        $this->expectOutputString("Hello ");
        $guy->sayHello();
    }


    public function testSmallTalk()
    {
        $guy = new Guy();
        $this->expectOutputString("a");
        $guy->smallTalk();
    }

    public function testSmallTalkB()
    {
        $guy = new Guy();
        $this->expectOutputString("b");
        $guy->smallTalkB();
    }

    public function testBigTalk()
    {
        $guy = new Guy();
        $this->expectOutputString("A");
        $guy->bigTalk();
    }

    public function testBigTalkB()
    {
        $guy = new Guy();
        $this->expectOutputString("B");
        $guy->bigTalkB();
    }
}
