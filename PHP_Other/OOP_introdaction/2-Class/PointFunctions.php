<?php

namespace App\PointFunctions;

use App\Point;

function getMidpoint($point1, $point2)
{
    $x = ($point1->x + $point2->x) / 2;
    $y = ($point1->y + $point2->y) / 2;

    $point = new Point();
    $point->x = $x;
    $point->y = $y;
    return $point;
}

$point1 = new Point();
$point1->x = 1;
$point1->y = 10;
$point2 = new Point();
$point2->x = 10;
$point2->y = 1;

$midpoint = getMidpoint($point1, $point2);
$midpoint->x; // => 5.5
$midpoint->y; // => 5.5