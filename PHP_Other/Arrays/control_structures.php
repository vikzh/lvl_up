<h2>Реализуйте функцию findIndex, которая возвращает первый встретившийся индекс переданного элемента в случае если
    элемент присутствует в массиве и -1 в случае если он отсутствует. Аргументы:

    Массив
    Элемент
</h2>
<?php

function findIndex($coll, $element)
{
    foreach ($coll as $key => $item) {
        if ($element == $item) {
            return $key;
        }
    }

    return -1;
}

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5, 40];

findIndex($temperatures, 3); // => -1
findIndex($temperatures, 34); // => 1
findIndex($temperatures, 40); // => 3