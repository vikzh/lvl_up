<?php

//      1. Дан массив с числами. Проверьте, что в этом массиве есть число 5. Если есть - выведите 'да', а если нет - выведите 'нет'

$arr = [1,2,3,4,5];

$flag = false;
foreach ($arr as $element){
    if($element === 5){
        $flag = true;
        break;
    }
}

if($flag == true){
    echo 'Да';
} else echo 'Нет';



//      2. Дано число, например 31. Проверьте, что это число не делится ни на одно другое число кроме себя самого
// и единицы. То есть в нашем случае нужно проверить, что число 31 не делится на все числа от 2 до 30.
// Если число не делится - выведите 'нет', а если делится - выведите 'да'.

$number = 31;
$flag_task2 = false;

function hasDecimals($number){
    for($i = 2; $i < 31; $i++){
        if(($number % $i) == 0){
            return true;
        }
    }
    return false;
}

$flag_task2 = hasDecimals($number);
if($flag_task2 == true){
    echo 'Не простое';
} else echo 'Простое';



//      3. Дан массив с числами. Проверьте, есть ли в нем два одинаковых числа подряд.
//      Если есть - выведите 'да', а если нет - выведите 'нет'

$arr_task3 = [1,2,3,4,5,5,6,7];
function hasFollowing($arr){
    foreach ($arr as $key => $element){
        if($key > 0 && $arr[$key-1] === $element){
            return true;
        }
    }
    return false;
}
$flag_task3 = hasFollowing($arr_task3);
if($flag_task3 == 1) {
    echo 'да';
} else echo 'нет';