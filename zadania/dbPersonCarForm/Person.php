<?php


class Person
{

 private   $Person_id;
 private $Person_firstname;
 private $Person_secondname;



    /**
     * Person constructor.
     * @param $Person_firstname
     * @param $Person_secondname
     */
    public function __construct($Person_firstname, $Person_secondname)
    {
        $this->Person_firstname = $Person_firstname;
        $this->Person_secondname = $Person_secondname;
    }

    /**
     * @return mixed
     */
    public function getPersonId()
    {
        return $this->Person_id;
    }


    /**
     * @return mixed
     */
    public function getPersonFirstname()
    {
        return $this->Person_firstname;
    }

    /**
     * @param mixed $Person_firstname
     */
    public function setPersonFirstname($Person_firstname)
    {
        $this->Person_firstname = $Person_firstname;
    }

    /**
     * @return mixed
     */
    public function getPersonSecondname()
    {
        return $this->Person_secondname;
    }

    /**
     * @param mixed $Person_secondname
     */
    public function setPersonSecondname($Person_secondname)
    {
        $this->Person_secondname = $Person_secondname;
    }





}

?>