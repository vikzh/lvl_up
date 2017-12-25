<?php
// 1. Сделайте функцию cut, которая первым параметром будет принимать строку,
// а вторым параметром - сколько первых символов оставить в этой строке.
// Второй параметр должен быть необязательным и по умолчанию принимать значение 10.

function cut($string, $length = 10){
    return substr($string,0,$length);
}
var_dump(cut('viktor',3));


// 2. Дан массив с числами. Выведите последовательно его элементы используя рекурсию и не используя цикл.
function printArray($arr){
    if(!empty($arr)){
        echo array_shift($arr),',';
        printArray($arr);
    }
}
printArray([1,2,3,4,5]);


// 3. Дано число. Сложите его цифры. Если сумма получилась более 9-ти, опять сложите его цифры.
// И так, пока сумма не станет однозначным числом (9 и менее).

$number = 1999;
function checkSum($number){
    $sumOfNumbers = array_sum(str_split($number));
    if($sumOfNumbers > 9){
        checkSum($sumOfNumbers);
    } else echo "\n",'Last sum of Number = ',$sumOfNumbers;
}
checkSum($number);