<?php
include ("model/User.php");
include ("util/queries.php");

use PHPUnit\Framework\TestCase;

class QueriesTest extends TestCase
{

    public function testSaveUser()
    {
        $user = new User("jan", "daf", "fd", "dfasf", "Fdsafsa", "Fadsf", "fdasfd", "fdsaf");

        $this->assertEquals("INSERT INTO users(firstname, surname, email, gender, 
                  cardtype, cardnum, paymentnetwork, password) values('jan', 'daf', 'fd',
                                                                      'dfasf', 'Fdsafsa', 'Fadsf',
                                                                      'fdasfd', 'fdsaf');",
                  Queries::saveUser($user->getFirstname(), $user->getSurname(), $user->getEmail(), $user->getGender()
                      , $user->getCardType(), $user->getCardNum(), $user->getPaymentNetwork(), $user->getPassword()));
    }
}
