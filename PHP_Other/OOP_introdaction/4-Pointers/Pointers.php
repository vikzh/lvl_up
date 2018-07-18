<?php
function dup($point)
{
    $clonedPoint = new \App\Point();
    $clonedPoint->x = $point->x;
    $clonedPoint->y = $point->y;

    return $clonedPoint;
}