Реализуйте функцию summaryRanges, которая находит в массиве непрерывные возрастающие последовательности чисел и возвращает массив с их перечислением.

<?php
function summaryRanges(Array $array)
{
    $result = [];

    if (empty($array)) {
        return $array;
    }

    $firstValue = $array[0];
    $firstIndex = 0;
    foreach ($array as $index => $value) {
        if ($index === 0) {
            continue;
        }
        $expectedValue = $array[$index - 1] + 1;
        if ($expectedValue !== $value) {
            if ($firstIndex !== $index - 1) {
                $result[] = "$firstValue->{$array[$index - 1]}";
            }
            $firstValue = $value;
            $firstIndex = $index;
        } elseif ($index === sizeof($array) - 1 && $expectedValue === $value) {
            $result[] = "$firstValue->{$array[$index]}";
        }
    }

    return $result;
}

summaryRanges([1, 2, 3]);
// → ["1->3"]

summaryRanges([0, 1, 2, 4, 5, 7]);
// → ["0->2", "4->5"]

summaryRanges([110, 111, 112, 111, -5, -4, -2, -3, -4, -5]);
// → ['110->112', '-5->-4']