<?php

//1. Rounding and associative array
/*
 Find the root of the number 1000. Round it in the larger and smaller sides.
 In the array $ arr, write the first element of the root of the number,
 the second element - rounding down, the third element - in the larger.
*/
    $sqrt = sqrt(1000);
    $floor = floor($sqrt);
    $ceil = ceil($sqrt);
    $arr[] = $sqrt;
    $arr[] = $floor;
    $arr[] =$ceil;

    var_dump($arr);