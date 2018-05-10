<h2>Реализуйте функцию average, которая возвращает среднее арифметическое всех переданных аргументов. Функция принимает
    на вход от одного числа и больше.
</h2>
<?php

function average($first, ...$rest)
{
    return ($first + array_sum($rest)) / (1 + sizeof($rest));
}

average(0); // => 0
average(0, 10); // => 5
average(-3, 4, 2, 10); // => 3.25