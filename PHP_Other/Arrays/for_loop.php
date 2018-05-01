<h2>Реализуйте функцию addPrefix, которая добавляет каждому элементу в массиве переданный префикс. Функция предназначена для работы со строковыми элементами. Аргументы:

Массив
Префикс
После префикса автоматически добавляется пробел.
</h2>
<?php

function addPrefix($names, $prefix)
{
    $result = [];
    for ($i = 0; $i < sizeof($names); $i++) {
        $result[$i] = "{$prefix} {$names[$i]}";
    }

    return $result;
}

$names = ['john', 'smith', 'karl'];

$newNames = addPrefix($names, 'Mr');
// => ['Mr john', 'Mr smith', 'Mr karl'];