<?php

class Person
{
    private $name;
    private $age;
    private $id;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function __destruct()
    {
        if (!empty($this->id)) {
            //save object Person data
            print "Saving Person data";
        }
    }
}

$person = new Person("name", 20);
$person->setId(100);
unset($person);
//Saving Person data