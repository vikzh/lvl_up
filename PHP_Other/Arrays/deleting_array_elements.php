<h2>Реализуйте функцию getSameParity, которая принимает на вход массив чисел и возвращает новый, состоящий из элементов,
    у которых такая же четность, как и у первого элемента входного массива.
</h2>
<?php

function getSameParity($coll)
{
    $result = [];
    if (empty($coll)) {
        return $result;
    }
    $reminder = $coll[0] % 2;
    foreach ($coll as $item) {
        if ($item % 2 == $reminder) {
            $result[] = $item;
        }
    }

    return $result;
}

getSameParity([]); // => []
getSameParity([1, 2, 3]); // => [1, 3]
getSameParity([1, 2, 8]); // => [1]
getSameParity([2, 2, 8]); // => [2, 2, 8]

//Подсказки
//Проверка четности - остаток от деления: $item % 2 == 0 - четное число
//Проверка массива на пустоту empty