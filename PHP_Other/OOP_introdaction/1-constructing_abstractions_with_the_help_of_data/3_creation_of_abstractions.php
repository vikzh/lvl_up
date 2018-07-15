<h2>Отрезок - еще один графический примитив. В коде описывается парой точек, одна из которых - начало отрезка, другая -
    конец. Обычный отрезок не имеет направления, поэтому вы сами вольны выбирать то, какую точку считать началом, а
    какую концом.

    В этом задании подразумевается, что вы уже понимаете принцип построения абстракции и способны самостоятельно принять
    решение о том, как она будет реализована. Напомню, что сделать это можно разными способами и нет одного правильного.

    Реализуйте указанные ниже функции:

    makeSegment. Принимает на вход две точки и возвращает отрезок.
    getMidpointOfSegment. Принимает на вход отрезок и возвращает точку находящуюся на середине отрезка.
</h2>
<?php

function makeSegment($point1, $point2)
{
    return ['beginPoint' => $point1, 'endPoint' => $point2];
}

function getBeginPoint($segment)
{
    return $segment['beginPoint'];
}

function getEndPoint($segment)
{
    return $segment['endPoint'];
}

function getMidpointOfSegment($segment)
{
    $beginPoint = getBeginPoint($segment);
    $endPoint = getEndPoint($segment);

    $x = (getX($beginPoint) + getX($endPoint)) / 2;
    $y = (getY($beginPoint) + getY($endPoint)) / 2;

    return makeDecartPoint($x, $y);
}

$segment = makeSegment(makeDecartPoint(3, 2), makeDecartPoint(0, 0));
getMidpointOfSegment($segment); // => (1.5, 1)