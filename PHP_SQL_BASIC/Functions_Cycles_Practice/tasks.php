<?php
echo '<pre>';

//1. Выведите с помощью цикла столбец чисел от 1 до 10
for ($i = 1; $i <= 10; $i++) {
    echo $i, "\n";
}

//2. Выведите с помощью цикла столбец четных чисел от 1 до 10
for ($i = 2; $i <= 10; $i += 2) {
    echo $i . '<br>';
}

//3. Найдите с помощью цикла сумму чисел от 1 до 100
$sum_task3 = 0;
for ($i = 1; $i <= 10; $i++) {
    $sum_task3 += $i;
}
echo $sum_task3 . '<br>';

//4.Найдите с помощью цикла сумму квадратов чисел от 1 до 15
$sum_task4 = 0;
for ($i = 1; $i <= 15; $i++) {
    $sum_task4 += $i * $i;
}
echo $sum_task4 . '<br>';

//5. Найдите с помощью цикла сумму корней чисел от 1 до 15. Результат округлите до двух знаков после дробной части
$sum_task5 = 0;
for ($i = 1; $i <= 15; $i++) {
    $sum_task5 += $i / $i;
}
echo round($sum_task5, 2), "\n";

//6. Найдите с помощью цикла сумму тех чисел от 1 до 100, которые делятся на 7
$sum_task6 = 0;
for ($i = 1; $i <= 100; $i++) {
    if (!($i % 7)) $sum_task6 += $i;
}
echo $sum_task6 . '<br>';

//7. Заполните массив 10-ю иксами с помощью цикла
$arr_task7 = [];
for ($i = 0; $i < 10; $i++) {
    $arr_task7[] = 'x';
}
print_r($arr_task7);

//8. Заполните массив числами от 1 до 10 с помощью цикла
$arr_task8 = [];
for ($i = 1; $i <= 10; $i++) {
    $arr_task8[] = $i;
}
print_r($arr_task8);

//9. Заполните массив числами от 10 до 1 с помощью цикла
$arr_task9 = [];
for ($i = 10; $i >= 1; $i--) {
    $arr_task9[] = $i;
}
print_r($arr_task9);

//10.  Заполните массив 10-ю случайными числами от 1 до 10 с помощью цикла
$arr_task10 = [];
for ($i = 0; $i < 10; $i++) {
    $arr_task10[] = rand(1, 10);
}
print_r($arr_task10);

//11. С помощью цикла создайте строку из 6-ти символов, состоящую из случайных чисел от 1 до 9
$string_task11 = '';
for ($i = 0; $i < 6; $i++) {
    $string_task11 .= rand(1, 9);
}
echo $string_task11 . '<br>';

//12. Дан массив с числами. С помощью цикла найдите сумму элементов этого массива
$arr_task12 = [1, 2, 3, 4, 5];
$sum_task12 = 0;
foreach ($arr_task12 as $elem) {
    $sum_task12 += $elem;
}
echo $sum_task12, "\n";

//13. Дан массив с числами. С помощью цикла найдите сумму квадратов элементов этого массива.
$arr_task13 = [1, 2, 3, 4, 5];
$sum_task13 = 0;
foreach ($arr_task13 as $element) {
    $sum_task13 += $element * $element;
}
echo $sum_task13, "\n";

//14. Дан массив с числами. С помощью цикла найдите корень из суммы квадратов элементов этого массива.
// Результат округлите в меньшую сторону до целых.
$arr_task14 = [1, 2, 3, 4, 5, 6, 7, 8];
$sum_task14 = 0;
foreach ($arr_task14 as $element) {
    $sum_task14 += $element * $element;
}
echo floor(sqrt($sum_task14)), "\n";

//15. Дан массив с числами. Найдите сумму тех элементов массива, которые больше 0 и меньше 10
$arr_task15 = [1, 2, 4, 42, 0, 10];
$sum_task15 = 0;
foreach ($arr_task15 as $item) {
    if ($item > 0 && $item < 10) {
        $sum_task15 += $item;
    }
}
echo $sum_task15, "\n";

//16.Дан массив с числами. Проверьте, что в нем есть 3 одинаковых числа подряд
$arr_task16 = [1, 2, 3, 3, 3, 4, 5, 6];
$n_task16 = 0;
for ($i = 0; $i < count($arr_task16), $n_task16 < 3; $i++) {
    if ($arr_task16[$i] === $arr_task16[$i + 1]) {
        $n_task16++;
    } else $n_task16 = 0;
}
if ($n_task16 == 3) {
    echo 'есть 3 одинаковых числа' . '<br>';
} else {
    echo 'нет 3 одинаковых числа' . '<br>';
}

//17. С помощью цикла сформируйте строку '1223334444...' и так далее до заданного числа
$string_task17 = '';
$number_task17 = 5;
for ($i = 1; $i <= $number_task17; $i++) {
    for ($j = 0; $j < $i; $j++) {
        $string_task17 .= $i;
    }
}
var_dump($string_task17);

//18. Дан многомерный массив (см. его под задачей). С помощью цикла выведите строки в формате 'имя-зарплата'
$arr_task18 = [
    0 => ['name' => 'Коля', 'salary' => 300],
    1 => ['name' => 'Вася', 'salary' => 400],
    2 => ['name' => 'Петя', 'salary' => 500],
];
foreach ($arr_task18 as $item) {
    echo $item['name'] . '-' . $item['salary'], '<br>';
}

//19. Заполните двумерный массив случайными числами от 1 до 10. В каждом подмассиве должно быть по 10 элементов.
// Должно быть 10 подмассивов.
$arr_task19 = [];
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        $arr_task19[$i][$j] = rand(1, 10);
    }
}
print_r($arr_task19);


//20. Напишите свой аналог функции ucfirst (аналог - значит можно использовать все, что угодно, кроме этой функции).
function myUcfirst($string)
{
    $firstChr = substr($string, 0, 1);
    return strtoupper($firstChr) . substr($string, 1, strlen($string));
}

//21. Напишите свой аналог функции strrev. Решите задачу двумя способами
function myStrrev1($string)
{
    return implode(array_reverse(str_split($string)));
}

function myStrrev2($string)
{
    $stringLength = strlen($string);
    $resultString = '';
    for ($i = $stringLength - 1; $i >= 0; $i--) {
        $resultString .= substr($string, $i, 1);
    }
    return $resultString;
}

echo myStrrev2('test'), '<br>';

//22. Напишите свой аналог функции strlen
function myStrlen($string)
{
    return count(str_split($string));
}

//23. Поменяйте в строке большие буквы на маленькие и наоборот
$string_task23 = 'STRing';
for ($i = 0; $i < strlen($string_task23); $i++) {
    if (ord($string_task23[$i]) >= 65 && ord($string_task23[$i]) <= 90) {
        $string_task23[$i] = strtolower($string_task23[$i]);
    } else if (ord($string_task23[$i]) >= 97 && ord($string_task23[$i]) <= 122) {
        $string_task23[$i] = strtoupper($string_task23[$i]);
    }
}
echo $string_task23, '<br>';

//24. Преобразуйте строку 'var_text_hello' в 'varTextHello'. Скрипт должен работать с любыми стоками такого рода
$string_task24 = 'var_text_hello';
$tempArr = explode('_', $string_task24);
foreach ($tempArr as $key => $item) {
    if ($key == 0) continue;
    $tempArr[$key] = ucfirst($item);
}
$resultString_task24 = implode('', $tempArr);
echo $resultString_task24, '<br>';

//25. С помощью только одного цикла нарисуйте следующую пирамидку
for ($i = 1; $i < 10; $i++) {
    echo str_repeat($i, $i), '<br>';
}

//26. Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть не 5 рядов,
// а произвольное количество, оно задается так: $str = 'xxxxxxxx'; - это первый ряд пирамиды.
$str_task26 = 'xxxxxxxx';
$stringLength_task26 = strlen($str_task26);
for ($i = 0; $i < $stringLength_task26; $i++) {
    echo $str_task26, '<br>';
    $str_task26 = substr($str_task26, 0, strlen($str_task26) - 1);
}

//27. Дан массив с произвольными числами. Сделайте так, чтобы элемент повторился в массиве количество раз,
// соответствующее его числу. Пример: [1, 3, 2, 4] превратится в [1, 3, 3, 3, 2, 2, 4, 4, 4, 4].
$arr_task27 = [1, 3, 2, 4];
$arr2_task27 = [];
foreach ($arr_task27 as $item) {
    for ($i = 0; $i < $item; $i++) {
        $arr2_task27[] = $item;
    }
}
print_r($arr2_task27);
//28. Дан массив с произвольными целыми числами. Сделайте так, чтобы первый элемент стал ключом второго элемента,
// третий элемент - ключом четвертого и так далее. Пример: [1, 2, 3, 4, 5, 6] превратится в [1=>2, 3=>4, 5=>6].
$arr_task28 = [1, 2, 3, 4, 5, 6];
$arr2_task28 = [];
for ($i = 0; $i < count($arr_task28); $i += 2) {
    $arr2_task28[$arr_task28[$i]] = $arr_task28[$i + 1];
}
print_r($arr2_task28);
//29. Дана строка. Удалите из этой строки четные символы
$string_task29 = '123456';
$string2_task29 = '';
for ($i = 1; $i < strlen($string_task29); $i += 2) {
    $string2_task29 .= $string_task29[$i];
}
var_dump($string2_task29);
//30. Дана строка. Поменяйте ее первый символ на второй и наоборот,
// третий на четвертый и наоборот, пятый на шестой и наоборот и так далее.
// То есть из строки '12345678' нужно сделать '21436587'
$string_task30 = '12345678';
$string2_task30 = array_reverse(str_split(strrev($string_task30), 2));
echo implode('', $string2_task30), '<br>';


//31. Сделайте аналог функции array_unique
$arr_task31 = [1, 2, 3, 4, 5, 5];
function myArray_unique($arr)
{
    $arr2_task31 = [];
    foreach ($arr as $elem) {
        if (in_array($elem, $arr2_task31) == false) {
            $arr2_task31[] = $elem;
        }
    }
    return $arr2_task31;
}

var_dump(myArray_unique($arr_task31));

//32. Сделайте функцию, противоположную функции array_unique.
// Ваша функция должна оставлять дубли и удалять элементы, не имеющие дублей.
$arr_task32 = [1, 2, 2, 3, 3, 3, 4, 5];
function myArrayNotUnique($arr)
{
    $arr2_task32 = [];
    foreach ($arr as $key => $elem) {
        unset($arr[$key]);
        var_dump($elem);
        if (in_array($elem, $arr)) {
            $arr2_task32[] = $elem;
        }
        var_dump($arr2_task32);
    }
    return $arr2_task32;
}

var_dump(myArrayNotUnique($arr_task32));
//33. Напишите скрипт, который проверяет, является ли данное число простым
// (простое число - это то, которое делится только на 1 и на само себя).
$number_task33 = 17;
$flag_task33 = 0;
for ($i = 2; $i < $number_task33; $i++) {
    if (($number_task33 % $i) == 0) {
        $flag_task33 = 1;
        break;
    }
}
if ($flag_task33) {
    echo 'Не простое', '<br>';
} else {
    echo 'Простое', '<br>';
}


//34. Дан массив со строками. Запишите в новый массив только те строки, которые начинаются с 'http://'.
$arr_task34 = [
    'http://site1.com',
    'https:/site2.co,',
    'not site',
    'http://site2.com'
];
$arr2_task34 = [];
foreach ($arr_task34 as $item) {
    if (strpos($item, 'http://') === 0) {
        $arr2_task34[] = $item;
    }
}
var_dump($arr2_task34);
echo '</pre>';