<h2>Поиск пересечения двух неотсортированных массивов, операция в рамках которой выполняется вложенный цикл с полной
    поверкой каждого элемента первого массива, на вхождение во второй. Сложность данного алгоритма O(nm) (проивезедение
    n и m), где n и m размерности массивов. Если массивы отсортированы, то можно реализовать алгоритм сложно которого
    уже O(n + m), что значительно лучше. Суть алгоритма довольно проста. В коде вводятся два указателя (индекса) на
    каждый из массивов. Начальное значение каждого указателя 0. Затем идет проверка элементов находящихся под этими
    индексами в обоих массивах. Если они совпадают то значение заносится в результирующий массив, а оба индекса
    инкрементируются, если значение в первом массиве больше чем во втором, то инкрементируется указатель второго
    массива, иначе первого.

    src\Arrays.php
    Реализуйте функцию getIntersectionForSortedArray, которая принимает на вход два отсортированных массива и находит их
    пересечение.
</h2>
<?php

$size1 = sizeof($arr1);
$size2 = sizeof($arr2);

if ($size1 == 0 || $size2 == 0) {
    return [];
}

$i1 = 0;
$i2 = 0;
$result = [];
do {
    if ($arr1[$i1] == $arr2[$i2]) {
        $result[] = $arr1[$i1];
        $i1++;
        $i2++;
    } elseif ($arr1[$i1] > $arr2[$i2]) {
        $i2++;
    } else {
        $i1++;
    }
} while ($i1 < $size1 && $i2 < $size2);

return $result;

getIntersectionOfSortedArray([10, 11, 24], [10, 13, 14, 18, 24, 30]);
// => [10, 24]
//Подсказки
//Для данной задачи хорошо подходит цикл do..while.
//Не забудьте поставить проверку на размерность массивов . Если хотя бы один из них пустой, то пересечений нет .