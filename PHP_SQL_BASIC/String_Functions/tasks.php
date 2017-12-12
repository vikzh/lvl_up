<?php
// Sting Functions

//      1. Дана строка 'minsk'. Сделайте из нее строку 'MINSK'.

$string_task1 = 'minsk';
$result_task1 = strtoupper($string_task1);
echo '<pre>';
var_dump($result_task1);
echo '</pre>';

//      2. Дана строка 'минск'. Сделайте из нее строку 'МИНСК'.

$string_task2 = 'минск';
$result_task2 = mb_strtoupper($string_task2);
echo '<pre>';
var_dump($result_task2);
echo '</pre>';

//      3. Дана строка 'MINSK'. Сделайте из нее строку 'Minsk'.

$string_task3 = 'MINSK';
$result_task3 = strtolower(ucfirst($string_task3));
echo '<pre>';
var_dump($result_task3);
echo '</pre>';

echo substr('abcdef',-2,2);

echo " ", strtr('111222', '12', 'ab');