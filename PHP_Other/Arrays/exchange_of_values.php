<h2>Реализуйте функцию swap, которая меняет местами два элемента относительно переданного индекса. Например если передан индекс 5, то функция меняет местами элементы находящиеся по индексам 4 и 6 Аргументы:

Массив
Индекс
Если хотя бы одного из индексов не существует, функция возвращает исходный массив.
</h2>
<?php

function swap($coll, $center)
{
    $firstIndex = $center - 1;
    $lastIndex = $center + 1;

    if (array_key_exists($firstIndex, $coll) && array_key_exists($lastIndex, $coll)) {
        $temp = $coll[$firstIndex];
        $coll[$firstIndex] = $coll[$lastIndex];
        $coll[$lastIndex] = $temp;
    }

    return $coll;
}

$names = ['john', 'smith', 'karl'];

swap($names, 1);
// => ['karl', 'smith', 'john'];

swap($names, 2);
// => ['john', 'smith', 'karl']

swap($names, 0);
// => ['john', 'smith', 'karl']