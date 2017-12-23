<?php
echo '<pre>';
//      1. Дан массив с числами. Создайте из него новый массив, где останутся лежать только положительные числа.
//Создайте для этого вспомогательную функцию isPositive, которая параметром будет принимать число и возвращать true,
//если число положительное, и false - если отрицательное.

$arr = [1,2,-3,-4,5,6,-7];
$arrPositive = [];

function isPositive($number){
    return $number > 0;
}

foreach ($arr as $element){
    if(isPositive($element)){
        $arrPositive[] = $element;
    }
}

var_dump($arrPositive);


//      2. Сделайте функцию isNumberInRange, которая параметром принимает число и проверяет, что оно больше
//      нуля и меньше 10. Если это так - пусть функция возвращает true, если не так - false.

function isNumberInRange($number){
    return $number > 0 && $number < 10;
}

var_dump(isNumberInRange(0));


//      3. Дан массив с числами. Запишите в новый массив только те числа, которые больше нуля и меньше 10-ти.
//      Для этого используйте вспомогательную функцию isNumberInRange из предыдущей задачи.

$arr_task3 = [0,-1,1,2,3,5,-11,10,9];
$arr_task3New = [];
foreach ($arr_task3 as $elem){
    if(isNumberInRange($elem)){
        $arr_task3New[] = $elem;
    }
}

var_dump($arr_task3New);


//      4. Сделайте функцию getDigitsSum (digit - это цифра), которая параметром принимает
//      целое число и возвращает сумму его цифр.

function getDigitsSum($digit){
    str_split($digit);
    return array_sum(str_split($digit));
}
var_dump(getDigitsSum(-12));


//      5. Сделайте функцию isEven() (even - это четный), которая параметром принимает целое число и проверяет:
//      четное оно или нет. Если четное - пусть функция возвращает true, если нечетное - false.
function isEven($num){
    if($num %2 == 0){
        return true;
    } else {
        return false;
    }
}
var_dump(isEven(3));


//      6. Дан массив с целыми числами. Создайте из него новый массив, где останутся лежать только четные из этих чисел.
//      Для этого используйте вспомогательную функцию isEven из предыдущей задачи.
$arr_task6 = [1,2,3,10,-1,-2,-10,0];
$arr_task6New = [];
foreach ($arr_task6 as $elem) {
    if (isEven($elem)) {
        $arr_task6New[] = $elem;
    }
}
var_dump($arr_task6New);


//      7. Сделайте функцию getDivisors, которая параметром принимает число
//      и возвращает массив его делителей (чисел, на которое делится данное число).
function getDivisors($num){
    for ($i = 1;$i <= $num; $i++){
        if($num % $i == 0){
            $arrOfDivisors[] = $i;
        }
    }
    return $arrOfDivisors;
}
var_dump(getDivisors(12));


//      8.Сделайте функцию getCommonDivisors, которая параметром принимает 2 числа, а возвращает массив их общих
//      делителей. Для этого используйте вспомогательную функцию getDivisors из предыдущей задачи.
function getCommonDivisors($num1, $num2){
    return array_intersect(getDivisors($num1),getDivisors($num2));
}
var_dump(getCommonDivisors(12,6));
echo '</pre>';