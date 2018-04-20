<?php

class Account
{
    private $balance;

    function __construct($balance)
    {
        $this->balance = $balance;
    }
}

class Person
{
    private $name;
    private $age;
    private $id;
    private $account;

    function __construct($name, $age, $account)
    {
        $this->name = $name;
        $this->age = $age;
        $this->account = $account;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    function __clone()
    {
        $this->id = 0;
        $this->account = clone $this->account;
    }
}

$account = new Account(500);
$person = new Person("Name", 20, $account);
$person->setId(100);
$person2 = clone $person;
//person2:
//name:"Name"
//age:20
//id:0
//balance:500
