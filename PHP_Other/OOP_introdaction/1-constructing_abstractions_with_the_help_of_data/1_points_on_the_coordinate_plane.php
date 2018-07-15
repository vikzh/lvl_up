<h2>Реализуйте функцию calculateDistance, которая находит расстояние между двумя точками
</h2>
<?php

function calculateDistance($point1, $point2)
{
    $deltaX = $point2[0] - $point1[0];
    $deltaY = $point2[1] - $point1[1];

    return sqrt($deltaX ** 2 + $deltaY ** 2);
}

$point1 = [0, 0];
$point2 = [3, 4];
calculateDistance($point1, $point2); // => 5