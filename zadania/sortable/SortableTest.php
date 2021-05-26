<?php
include ("Sortable.php");

use PHPUnit\Framework\TestCase;

class SortableTest extends TestCase
{

    public function testIsSorted()
    {
        $arr = Array(1,2,3,10,10);
        $compare = new Comparator();
        $compare->isSorted($arr);
        $this->assertEquals(true, $compare->sortedL);
    }

    public function testComparable()
    {
        $x = 5;
        $y = 6;
        $compare = new Comparator();
        $this->assertEquals(-1, $compare->comparable($x, $y));
    }
}
