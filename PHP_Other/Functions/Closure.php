<h2>Реализуйте функцию without, которая работает по такому же принципу, что и функция из теории, кроме одного аспекта.
    Эта функция должна принимать любое число аргументов, где первый аргумент массив, а все остальные - значения, которые
    нужно исключить из переданного массива.
</h2>
<?php

function without(array $items, ...$values)
{
    $filtered = array_filter($items, function ($item) use ($values) {
        return !in_array($item, $values);
    });
    // Сбрасываем ключи
    return array_values($filtered);
}

without([3, 4, 10, 4, 'true'], 4); // => [3, 10, 'true']
without(['3', 2], 0, 5, 11); // => ['3', 2]