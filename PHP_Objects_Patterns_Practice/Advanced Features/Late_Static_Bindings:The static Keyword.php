<?php
abstract class DomainObject
{
    public static function create(){
        return new static();
    }

    static function getGroup(){
        return 'default';
    }
}

class User extends DomainObject
{

}

class Document extends DomainObject
{
    static function getGroup()
    {
        return 'document';
    }
}

class SpreadSheet extends Document
{

}

var_dump(User::create()); //default
var_dump(SpreadSheet::create()); //document