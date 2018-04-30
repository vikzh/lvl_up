<h2>Реализуйте функцию get, которая излекает из массива элемент по указанному индексу если индекс существует, либо
    возвращает значение по умолчанию. Функция принимает на вход три аргумента:

    Массив
    Индекс
    Значение по умолчанию (которое по умолчанию равно null)
    Пример:
</h2>
<?php

function get(array $arr, $index, $default = null)
{
    if (!array_key_exists($index, $arr)) {
        return $default;
    }

    return $arr[$index];
}

$cities = ['moscow', 'london', 'berlin', 'porto'];

get($cities, 1); // => london
get($cities, 4); // => null
get($cities, 10, 'paris'); // => paris