<?php

namespace App;

class Segment
{
    private $beginPoint;
    private $endPoint;

    public function __construct($beginPoint, $endPoint)
    {
        $this->beginPoint = $beginPoint;
        $this->endPoint = $endPoint;
    }

    public function __toString()
    {
        return "[{$this->beginPoint}, {$this->endPoint}]";
    }
}