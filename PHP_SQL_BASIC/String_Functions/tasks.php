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


//      4. В переменной $date лежит дата в формате '31-12-2030'. Преобразуйте эту дату в формат '2030.12.31'.

$string_task4 = '31-12-2030';
$array_task4 = explode('-',$string_task4);
$array_task4 = array_reverse($array_task4);
$result_task4 = implode('.',$array_task4);
echo '<pre>';
var_dump($result_task4);
echo '</pre>';


//      5. Дана строка 'london is the capital of great britain'. Сделайте из нее строку 'London Is The Capital Of Great Britain'.

$string_task5 = 'london is the capital of great britain';
echo "\n",ucwords($string_task5);


//      6. Дана строка 'LONDON'. Сделайте из нее строку 'London'

$string_task6 = 'LONDON';
echo "<pre>\n</pre>",ucfirst(strtolower($string_task6));


//      7. Дана строка 'html css php'. Найдите количество символов в этой строке.

$string_task7 = 'html css php';
echo "<pre>\n</pre>",strlen($string_task7);


//      8. Дана переменная $password, в которой хранится пароль пользователя. Если количество символов пароля
// больше 5-ти и меньше 10-ти, то выведите пользователю сообщение о том, что пароль подходит,
// иначе сообщение о том, что нужно придумать другой пароль.

$password = '5678932321';
if(strlen($password)>5 && strlen($password)<10){
    echo "<pre>\n</pre>","OK";
} else{
    echo "<pre>\n</pre>","NO";
}


//      9. Дана строка 'html css php'. Вырежьте из нее и выведите на экран слово 'html', слово 'css' и слово 'php'
$string_task9 = 'html css php';
$result_task9 = explode(' ',$string_task9);
echo '<pre>';
var_dump($result_task9);
echo '</pre>';

//      10. Дана строка. Вырежите и выведите на экран последние 3 символа этой строки
$string_task10 = 'my string';
echo "<pre>\n</pre>",substr($string_task10,-3);


//      11. Дана строка. Проверьте, что она начинается на 'http://'. Если это так, выведите 'да', если не так - 'нет'a
$string_task11 = 'http://mysiite,com';
if(substr($string_task11,0,7)=='http://'){
    echo "<pre>\n</pre>",'HTTP';
} else {
    echo "<pre>\n</pre>",'NOT HTTP';
}


//      12. Дана строка. Если в этой строке более 5-ти символов - вырежите из нее первые 5 символов, добавьте
//троеточие в конец и выведите на экран. Если же в этой строке 5 и менее символов - просто выведите эту строку на экран
$string_task12 = "my string task 12";
if(strlen($string_task12) > 5){
    echo "<pre>\n</pre>",substr($string_task12,0,5).'...';
} else{
    echo "<pre>\n</pre>","string lenght < 5";
}


//      13. Дана строка '31.12.2013'. Замените все точки на дефисы
$string_task13 = '31.12.2013';
echo "<pre>\n</pre>",str_replace('.','-',$string_task13);


//      14. Дана строка $str. Замените в ней все буквы 'a' на цифру 1, буквы 'b' - на 2, а буквы 'c' - на 3
