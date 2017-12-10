<?php

//1. Rounding and associative array
/*
 Find the root of the number 1000. Round it in the larger and smaller sides.
 In the array $ arr, write the first element of the root of the number,
 the second element - rounding down, the third element - in the larger.

 Найдите корень из числа 1000. Округлите его в большую и меньшую стороны.
 В массив $arr запишите первым элементом корень из числа, вторым элементом
 - округление в меньшую сторону, третьим элементом - в большую.
 */

    $sqrt = sqrt(1000);
    $floor = floor($sqrt);
    $ceil = ceil($sqrt);
    $arr[] = $sqrt;
    $arr[] = $floor;
    $arr[] = $ceil;
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';

 //2. Fill the array with 50 random numbers from 1 to 10
 //   Заполните массив 30-ю случайными числами от 1 до 10.
    for($i=0;$i<50;$i++){
        $rand_arr[] = mt_rand(1,10);
    }
    echo '<pre>';
    var_dump($rand_arr);
    echo '</pre>';

//3. Work with %
//
//  3.1 The variables $ a = 10 and $ b = 3 are given. Find the remainder of dividing $ a by $ b.
//      Даны переменные $a=10 и $b=3. Найдите остаток от деления $a на $b.

    $a31 = 10;
    $b31 = 3;
    $resultDividing = $a31 % $b31;
    echo '<pre>';
    var_dump($resultDividing);
    echo '</pre>';

/*  3.2 The variables $ a and $ b are given. Check that $ a is divisible without residue by $ b.
    If this is so, print 'Share' and the result of the division, otherwise output 'Share with
    remainder' and remainder of division

    Даны переменные $a и $b. Проверьте, что $a делится без остатка на $b. Если это так - выведите
    'Делится' и результат деления, иначе выведите 'Делится с остатком' и остаток от деления
*/

    $a32 = 20;
    $b32 = 2;

    if(($a32 % $b32) == 0 ){
        echo "no residue";
    }
    else echo  "residue";

// 4. Working with the degree and root
//
// 4.1 Raise 2 to 10 degrees. Write the result in $ st.
//     Возведите 2 в 10 степень. Результат запишите в переменную $st.

    $st = pow(2,10);
    echo '<pre>';
    var_dump($st);
    echo '</pre>';


// 4.2 Найдите квадратный корень из 245

    $sqrt42 = sqrt(245);
    echo '<pre>';
    var_dump($sqrt42);
    echo '</pre>';

// 4.3 Дан массив с элементами 4, 2, 5, 19, 13, 0, 10. Найдите корень из суммы квадратов его элементов.
// Для решения воспользуйтесь циклом foreach.

    $arr43 = [4 , 2 , 5, 19, 13, 0, 10];
    $arr43Sum;
    foreach ($arr43 as $element){
        $arr43Sum += $element * $element;
    }
    $result43 = sqrt($arr43Sum);
    echo '<pre>';
    var_dump($result43);
    echo '</pre>';


//5 Работа с функциями округления
//  5.1 Найдите квадратный корень из 379. Результат округлите до целых, до десятых, до сотых.
    $sqrt51 = sqrt(379);
    echo round($sqrt51);
    echo round($sqrt51,1);
    echo round($sqrt51,2);

//  5.2 Найдите квадратный корень из 587. Округлите результат в большую и меньшую сторону,
// запишите результаты округления в ассоциативный массив с ключами 'floor' и 'ceil'.

    $sqrt52 = sqrt(587);
    $result52 = [
        'flor' => floor($sqrt52),
        'ceil' => ceil($sqrt52)
    ];
    echo '<pre>';
    var_dump($result52);
    echo '</pre>';


