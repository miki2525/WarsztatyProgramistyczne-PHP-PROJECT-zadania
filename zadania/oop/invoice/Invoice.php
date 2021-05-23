<?php

class Invoice{

    private $product_number;
    private $product_description;
    private $quantity;
    private $pricePerItem;

    /**
     * Invoice constructor.
     * @param $product_number
     * @param $product_description
     * @param $quantity
     * @param $pricePerItem
     */
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



}