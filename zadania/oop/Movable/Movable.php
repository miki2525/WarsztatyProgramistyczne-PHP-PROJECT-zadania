<?php


interface Movable
{
    function moveUp();
    function moveDown();
    function moveLeft();
    function moveRight();
}

class MovablePoint implements Movable{

    public $x, $y, $xSpeed, $ySpeed;

    public function __construct($x, $y, $xSpeed, $ySpeed)
    {
        $this->x = $x;
        $this->y = $y;
        $this->xSpeed = $xSpeed;
        $this->ySpeed = $ySpeed;
    }


    function moveUp()
    {
        $this->y = $this->y + $this->ySpeed;

    }

    function moveDown()
    {
        $this->y = $this->y - $this->ySpeed;
    }

    function moveLeft()
    {
        $this->x = $this->x - $this->xSpeed;
    }

    function moveRight()
    {
        $this->x = $this->x + $this->xSpeed;
    }



    function __toString()
{
    return "x: " . $this->x . ", y: " . $this->y .", xSpeed: " . $this->xSpeed . ", ySpeed: " . $this->ySpeed;
}
}

$p1 = new MovablePoint(0,0,1,1);
$p2 = new MovablePoint(5,5,5,5);
$p3 = new MovablePoint(1,1,2,3);
$p4 = new MovablePoint(100,100,125,25);

echo "p1(x,y): (" . $p1->x ." , " .$p1->y . ")";
echo "<br>\np2(x,y): (" . $p2->x ." , " .$p2->y . ")";
echo "<br>\np3(x,y): (" . $p3->x ." , " .$p3->y . ")";
echo "<br>\np4(x,y): (" . $p4->x ." , " .$p4->y . ")";

$p1->moveDown();$p1->moveRight();
$p2->moveUp();$p2->moveRight();
$p3->moveLeft();$p3->moveLeft();
$p4->moveDown();$p4->moveUp();$p4->moveLeft();

echo "<br>\npo przesunięciu dól,prawo p1(x,y): (" . $p1->x ." , " .$p1->y . ")";
echo "<br>\npo przesunięciu góra,prawo p2(x,y): (" . $p2->x ." , " .$p2->y . ")";
echo "<br>\npo przesunięciu lewo,lewo p3(x,y): (" . $p3->x ." , " .$p3->y . ")";
echo "<br>\npo przesunięciu dół,góra, lewo p4(x,y): (" . $p4->x ." , " .$p4->y . ")";


?>