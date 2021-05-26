<?php


trait Sortable
{
    public $sortedL = false;
    abstract function comparable($x, $y);
    function isSorted($object){
        for ($i = 0; $i < count($object) - 1; $i++){
           if($this->comparable($object[$i], $object[$i+1]) == -1){
               $this->sortedL = true;
           }
           else{
               $this->sortedL = false;
               break;
           }
        }
    }
}

class Comparator{
    use Sortable;

    function comparable($x, $y)
    {
        return $x <= $y ? -1 : 1;
    }
}

$arr = Array(1,2,3,10,10);
$compare = new Comparator();
$compare->isSorted($arr);
print_r($arr);
if($compare->sortedL){ echo "posortowana rosnąco";} else{echo "nieposortowana";}
echo "\n";
$arr2 = Array(1,20,3,10,10);
$compare->isSorted($arr2);
print_r($arr2);
if($compare->sortedL){ echo "posortowana rosnąco";} else{echo "nieposortowana";}