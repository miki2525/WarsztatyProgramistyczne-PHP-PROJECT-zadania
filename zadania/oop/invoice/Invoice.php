<?php

class Invoice{

    private $product_number;
    private $product_description;
    private $quantity;
    private $pricePerItem;

    public function __construct($product_number, $product_description, $quantity, $pricePerItem)
    {
        $this->product_number = $product_number;
        $this->product_description = $product_description;
        $this->quantity = $quantity;
        $this->pricePerItem = $pricePerItem;
    }

    public function getProductNumber()
    {
        return $this->product_number;
    }

    public function setProductNumber($product_number)
    {
        $this->product_number = $product_number;
    }


    public function getProductDescription()
    {
        return $this->product_description;
    }

    public function setProductDescription($product_description)
    {
        $this->product_description = $product_description;
    }


    public function getQuantity()
    {
        return $this->quantity;
    }


    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getPricePerItem()
    {
        return $this->pricePerItem;
    }

    public function setPricePerItem($pricePerItem)
    {
        $this->pricePerItem = $pricePerItem;
    }


    public function Amount(){
        if ($this->pricePerItem < 1 ||
        $this->quantity < 1){
            return 0;
        }
        else{
            return $this->pricePerItem * $this->quantity;
        }
}
}
$obj1 = new Invoice(1, "ABC", 10, 1);
$obj2 = new Invoice(2, "CBA", -1, -5);
$obj3 = new Invoice(3, "BCA", 12, 0);
$obj4 = new Invoice(4, "BAC", 0, 133);

echo "obj1 Amount(): " . $obj1->Amount();
echo "\nobj2 Amount(): " . $obj2->Amount();
echo "\nobj3 Amount(): " . $obj3->Amount();
echo "\nobj4 Amount(): " . $obj4->Amount();


?>