<h2>Реализуйте функцию countUniqChars, которая считает количество уникальных символов в переданной строке. Задание
    необходимо выполнить без использования функции array_unique.
</h2>
<?php

function countUniqChars($text)
{
    $chars = str_split($text);
    $count = 0;
    $uniqChars = [];
    foreach ($chars as $char) {
        if (in_array($char, $uniqChars)) {
            continue;
        }
        $uniqChars[] = $char;
        $count++;
    }

    return $count;
}

$text1 = 'yy';
countUniqChars($text1); // => 1

$text2 = 'yyab';
countUniqChars($text2); // => 3

$text3 = 'You know nothing Jon Snow';
countUniqChars($text3); // => 13