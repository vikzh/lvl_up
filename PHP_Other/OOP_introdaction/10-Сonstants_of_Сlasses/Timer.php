<?php

namespace App;

class Timer
{
    const SEC_PER_MIN = 60;
    const SEC_PER_HOUR = 60 * self::SEC_PER_MIN;

    private $secondsCount;

    public function __construct($sec, $min = 0, $hour = 0)
    {
        $this->secondsCount = $sec + $min * self::SEC_PER_MIN + $hour * self::SEC_PER_HOUR;
    }

    public function getLeftSeconds()
    {
        return $this->secondsCount;
    }

    public function tick()
    {
        $this->secondsCount--;
    }
}
