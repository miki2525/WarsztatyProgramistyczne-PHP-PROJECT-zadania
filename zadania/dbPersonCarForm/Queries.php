<?php


class Queries
{
public static $selectPersonId = "SELECT Person_id from Person;";
public static $selectAll = "SELECT * from Person P JOIN Cars C ON P.Person_id=C.Person_id";
public static $sortByPriceDesc = "SELECT * from Person P JOIN Cars C ON P.Person_id=C.Person_id
                                    ORDER BY C.Cars_price DESC";
public static $sortByPriceAsc = "SELECT * from Person P JOIN Cars C ON P.Person_id=C.Person_id
                                    ORDER BY C.Cars_price ASC";
public static $sortByNameAsc = "SELECT * from Person P JOIN Cars C ON P.Person_id=C.Person_id
                                    ORDER BY P.Person_firstname ASC";
public static $sortByNameDESC = "SELECT * from Person P JOIN Cars C ON P.Person_id=C.Person_id
                                    ORDER BY P.Person_firstname DESC";
public static $createPerTable = "CREATE table Person(Person_id int auto_increment not null primary key, 
Person_firstname varchar(255) not null, Person_secondname varchar(255) not null);";
public static $createCarsTable = "CREATE table Cars(Cars_id int auto_increment not null primary key, 
Cars_model varchar(255) not null, Cars_price float not null,
Cars_day_of_buy datetime not null, Person_id integer,
FOREIGN KEY (Person_id) references Person(Person_id) ON DELETE CASCADE);";


public static function insertPerson($name, $lname){
    return "INSERT INTO Person(Person_firstname, 
                   Person_secondname) values('$name', '$lname');";
}

public static function insertCar($model, $price, $dofbuy, $perid){
        return "INSERT INTO Cars(Cars_model, Cars_price,
                 Cars_day_of_buy, Person_id) values ('$model', '$price', 
                                                     '$dofbuy', '$perid');";
    }

public static function getCarbyID($id){
    return "SELECT * from Cars WHERE Cars_id='$id';";
}

public static function getAllByCarID($id){
    return "SELECT * from Person P JOIN Cars C ON P.Person_id=C.Person_id WHERE C.Cars_id='$id';";
}

public static function deleteCarbyID($id)
{
    return "DELETE from Cars WHERE Cars_id='$id';";
}

public static function deletePersonID($id){
        return "DELETE from Person WHERE Person_id='$id';";
    }


}