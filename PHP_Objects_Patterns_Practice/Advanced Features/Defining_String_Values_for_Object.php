<?php

class Person
{
    function getName()
    {
        return "Name";
    }

    function getAge()
    {
        return 20;
    }

    public function __toString()
    {
        $desc = $this->getName() . ' ' . $this->getAge();
        return $desc;
    }
}

$person = new Person();
echo $person;
//Name 20