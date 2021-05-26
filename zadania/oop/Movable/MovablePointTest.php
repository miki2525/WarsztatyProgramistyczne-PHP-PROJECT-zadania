<?php
include ("Movable.php");

use PHPUnit\Framework\TestCase;

class MovablePointTest extends TestCase
{

    public function testMoveLeft()
    {
        $p2 = new MovablePoint(5,5,5,5);
        $p2->moveLeft();
        $this->assertEquals(0, $p2->x);
    }

    public function testMoveRight()
    {
        $p2 = new MovablePoint(5,5,5,5);
        $p2->moveRight();
        $this->assertEquals(10, $p2->x);
    }

    public function testMoveDown()
    {
        $p2 = new MovablePoint(5,5,5,5);
        $p2->moveDown();
        $this->assertEquals(0, $p2->y);
    }

    public function testMoveUp()
    {
        $p2 = new MovablePoint(5,5,5,5);
        $p2->moveUp();
        $this->assertEquals(10, $p2->y);
    }
}
