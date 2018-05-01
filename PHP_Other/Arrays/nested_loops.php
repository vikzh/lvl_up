<h2>Реализуйте функцию getSameCount, которая считает количество общих уникальных элементов для двух массивов. Аргументы:

    Первый массив
    Второй массив
</h2>
<?php
function getSameCount($coll1, $coll2)
{
    $count = 0;
    $uniqColl1 = array_unique($coll1);
    $uniqColl2 = array_unique($coll2);
    foreach ($uniqColl1 as $item1) {
        foreach ($uniqColl2 as $item2) {
            if ($item1 === $item2) {
                $count++;
            }
        }
    }

    return $count;
}

//my another function with surprise
function getSameCount2($firstArray, $secondArray)
{
    $unArray = [];
    foreach ($firstArray as $element) {
        if (in_array($element, $secondArray, true) && !in_array($element, $unArray)) {
            $unArray[] = $element;
        }
    }

    return count($unArray);
}

//in_array(0,['a','b']) => 1 - 0 === int(string('a') === 0)

getSameCount([], []); // => 0
getSameCount([1, 10, 3], [10, 100, 35, 1]); // => 2
getSameCount([1, 3, 2, 2], [3, 1, 1, 2]); // => 3