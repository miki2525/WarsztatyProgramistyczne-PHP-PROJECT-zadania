<?php


class Cars
{
private $Cars_id;
private $Cars_model;
private $Cars_price;
private $Cars_day_of_buy;
private $Person_id;

    /**
     * Cars constructor.
     * @param $Cars_model
     * @param $Cars_price
     * @param $Cars_day_of_buy
     * @param $Person_id
     */
    public function __construct($Cars_model, $Cars_price, $Cars_day_of_buy, $Person_id)
    {
        $this->Cars_model = $Cars_model;
        $this->Cars_price = $Cars_price;
        $this->Cars_day_of_buy = $Cars_day_of_buy;
        $this->Person_id = $Person_id;
    }

    /**
     * @return mixed
     */
    public function getCarsId()
    {
        return $this->Cars_id;
    }


    /**
     * @return mixed
     */
    public function getCarsModel()
    {
        return $this->Cars_model;
    }

    /**
     * @param mixed $Cars_model
     */
    public function setCarsModel($Cars_model)
    {
        $this->Cars_model = $Cars_model;
    }

    /**
     * @return mixed
     */
    public function getCarsPrice()
    {
        return $this->Cars_price;
    }

    /**
     * @param mixed $Cars_price
     */
    public function setCarsPrice($Cars_price)
    {
        $this->Cars_price = $Cars_price;
    }

    /**
     * @return mixed
     */
    public function getCarsDayOfBuy()
    {
        return $this->Cars_day_of_buy;
    }

    /**
     * @param mixed $Cars_day_of_buy
     */
    public function setCarsDayOfBuy($Cars_day_of_buy)
    {
        $this->Cars_day_of_buy = $Cars_day_of_buy;
    }

    /**
     * @return mixed
     */
    public function getPersonId()
    {
        return $this->Person_id;
    }

    /**
     * @param mixed $Person_id
     */
    public function setPersonId($Person_id)
    {
        $this->Person_id = $Person_id;
    }




}