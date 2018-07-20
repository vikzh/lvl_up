<?php

namespace App;

class Time
{
    private $h;
    private $m;

    public static function fromString($time)
    {
        [$h, $m] = explode(':', $time);
        return new self($h, $m);
    }

    public function __construct($h, $m)
    {
        $this->h = $h;
        $this->m = $m;
    }

    public function toString()
    {
        return "{$this->h}:{$this->m}";
    }
}
