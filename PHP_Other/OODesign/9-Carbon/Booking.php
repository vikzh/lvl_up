<?php

class Booking
{
    public $dates = [];

    public function book($begin, $end)
    {
        if ($this->canBook($begin, $end)) {
            $this->dates[] = [new Carbon($begin), new Carbon($end)];
            return true;
        }

        return false;
    }

    public function canBook($begin, $end)
    {
        $carbonBegin = new Carbon($begin);
        $carbonEnd = new Carbon($end);
        if ($carbonBegin >= $carbonEnd) {
            return false;
        }
        foreach ($this->dates as [$b, $e]) {
            $beginInside = $carbonBegin > $b && $carbonBegin < $e;
            $endInside = $carbonEnd > $b && $carbonEnd < $e;
            if ($beginInside || $endInside) {
                return false;
            }
        }
        return true;
    }
}