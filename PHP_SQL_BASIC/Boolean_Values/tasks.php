<?php

//      1. Сделайте функцию, которая параметрами принимает 2 числа. Если эти числа равны - пусть функция
//      вернет true, а если не равны - false.

function check($a, $b){
    return $a === $b;
}

echo check(2,2);


//      2. Сделайте функцию, которая параметрами принимает 2 числа. Если их сумма больше 10 - пусть функция
//      вернет true, а если нет - false.

function checkSum($a, $b){
    return $a + $b > 10;
}

echo checkSum(9,2);


//      3. Сделайте функцию, которая параметром принимает число и проверяет - отрицательное оно или нет.
//      Если отрицательное - пусть функция вернет true, а если нет - false.

function signOfNumber($number){
    return $number < 0;
}

echo signOfNumber(-1);