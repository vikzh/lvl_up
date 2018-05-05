<h2>
    Иногда в программировании возникает задача поиска разницы между двумя наборами данных, такими как ассоциативные
    массивы. Например, при поиске различий в json файлах. Для этого даже существуют специальные сервисы, например,
    http://www.jsondiff.com/ (попробуйте нажать на ссылку sample data и затем кнопку Compare).

    Реализуйте функцию genDiff, которая возвращает ассоциативный массив, в котором каждому ключу из исходных массивов
    соответствует одно из четырех значений: added, deleted, changed или unchanged. Аргументы:

    Ассоциативный массив
    Ассоциативный массив
    Расшифровка:

    Added - ключ отсутствовал в первом массиве, но был добавлен во второй
    Deleted - ключ был в первом массиве, но отсутствует во втором
    Changed - ключ присутствовал и в первом и во втором массиве, но значения отличаются
    Unchanged - ключ присутствовал и в первом и во втором массиве с одинаковыми значениями
</h2>
<?php

function genDiff(array $data1, array $data2)
{
    $keys = union(array_keys($data1), array_keys($data2));
    $result = [];
    foreach ($keys as $key) {
        if (array_key_exists($key, $data1) && array_key_exists($key, $data2)) {
            if ($data1[$key] === $data2[$key]) {
                $result[$key] = 'unchanged';
            } else {
                $result[$key] = 'changed';
            }
        } elseif (array_key_exists($key, $data2)) {
            $result[$key] = 'added';
        } elseif (array_key_exists($key, $data1)) {
            $result[$key] = 'deleted';
        }
    }

    return $result;
}

$result = genDiff(
    ['one' => 'eon', 'two' => 'two', 'four' => true],
    ['two' => 'own', 'zero' => 4, 'four' => true]
);
// => [
//     'one' => 'deleted',
//     'two' => 'changed'
//     'zero' => 'added',
//     'four' => 'unchanged',
// ];