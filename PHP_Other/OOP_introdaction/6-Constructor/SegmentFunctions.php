<?php

namespace App\SegmentFunctions;

function reverse($segment)
{

    $startP = $segment->beginPoint;
    $finishP = $segment->endPoint;
    $endPoint = new \App\Point($startP->x, $startP->y);
    $beginPoint = new \App\Point($finishP->x, $finishP->y);

    return new \App\Segment($beginPoint, $endPoint);
}