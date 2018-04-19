<?php

class Address
{
    private $number;
    private $street;

    function __construct($maybenumber, $maybestreet = null)
    {
        if (is_null($maybestreet)) {
            $this->streetaddress = $maybenumber;
        } else {
            $this->number = $maybenumber;
            $this->street = $maybestreet;
        }
    }

    function __set($property, $value)
    {
        if ($property === 'streetaddress') {
            if (preg_match("/^(\d+.*?)[\s,]+(.+)%/", $value, $matches)) {
                $this->number = $matches[1];
                $this->street = $matches[2];
            } else throw new Exception("Error in Address: {$value}");
        }
    }

    function __get($property)
    {
        if ($property === 'streetaddress') {
            return $this->street . ' ' . $this->number;
        }
    }
}

$address = new Address("441b Bakers Street");
print "Address: $address->streetaddress";


class Person
{
    private $_name;
    private $_age;
    private $writer;

    function __construct(PersonWriter $writer)
    {
        $this->writer = $writer;
    }

    function __call($methodname, $arguments)
    {
        if (method_exists($this->writer, $methodname)) {
            return $this->writer->$methodname($this);
        }
    }

    function __set($property, $value)
    {
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
    }

    function __isset($property)
    {
        $method = "get{$property}";
        return (method_exists($this, $method));
    }

    function __unset($property)
    {
        $method = "get{$property}";
        if (method_exists($this, $property)) {
            return $this->$method(null);
        }
    }

    function __get($property)
    {
        $method = "get{$property}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    function getName()
    {
        return "Name";
    }

    function getAge()
    {
        return 20;
    }

    function setName($name)
    {
        $this->_name = $name;
        if (!is_null($name)) {
            $this->_name = strtoupper($this->_name);
        }
    }

    function setAge($age)
    {
        $this->_age = $age;
    }

}

class PersonWriter
{
    function writeName(Person $p)
    {
        print $p->getName();
    }

    function writeAge(Person $p)
    {
        print $p->getAge();
    }
}

$p = new Person();
//implicit call of getName() method
print $p->name;

//now you can check property before use it
if (isset($p->name)) {
    print $p->name;
}

$person = new Person(new PersonWriter());
$person->writeName();



