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

echo '<pre>';

//      14. Дана строка $str. Замените в ней все буквы 'a' на цифру 1, буквы 'b' - на 2, а буквы 'c' - на 3
$string_task14 = 'abcabc';
echo "\n",str_replace(['a','b','c'],[1,2,3],$string_task14);



//      15. Дана строка с буквами и цифрами, например, '1a2b3c4b5d6e7f8g9h0'. Удалите из нее все цифры. То есть в нашем
//       случае должна получится строка 'abcbdefgh'.
$string_task15 = '1a2b3c4b5d6e7f8g9h0';
echo "\n",str_replace([1,2,3,4,5,6,7,8,9,0],'',$string_task15);



//      16. Дана строка $str. Замените в ней все буквы 'a' на цифру 1, буквы 'b' - на 2, а буквы 'c' - на 3.
//      Решите задачу двумя способами работы с функцией strtr (массив замен и две строки замен).
$string_task16 = 'abcabcqwe';
echo "\n",strtr($string_task16,['a' => 1,'b' => 2,'c' => 3]);
echo "\n",strtr($string_task16,'abc','123');


//      17. Дана строка $str. Вырежите из нее подстроку с 3-го символа (отсчет с нуля),
//       5 штук и вместо нее вставьте '!!!'.
$string_task17 = 'myStringTask16';
echo "\n",substr_replace($string_task17,'!!!',2,5);


//      18. Дана строка 'abc abc abc'. Определите позицию первой буквы 'b'.
$string_task18 = 'abc abc abc';
echo "\n",strpos($string_task18,'b'),'(+1) - first b';

//      19. Дана строка 'abc abc abc'. Определите позицию последней буквы 'b'
$string_task19 = 'abc abc abc';
echo "\n",strrpos($string_task19,'b'),'(+1) - last b';

//      20. Дана строка 'abc abc abc'. Определите позицию первой найденной буквы 'b',
//       если начать поиск не с начала строки, а с позиции 3
$string_task20 = 'abc abc abc';
echo "\n",strpos($string_task20,'b',3),'(+1) [3 - start]';

//      21. Дана строка 'aaa aaa aaa aaa aaa'. Определите позицию второго пробела
$string_task21 = 'aaa aaa aaa aaa aaa';
echo "\n",strpos($string_task21,' ',strpos($string_task21,' ') + 1),'(+1) [2 - space]';

//      22. Проверьте, что в строке есть две точки подряд. Если это так - выведите 'есть', если не так - 'нет'.
$string_task22 = 'myString.. and ..';
if(strpos($string_task22,'..')){
    echo "\n",'есть';
} else echo "\n",'нет';

//      23. Проверьте, что строка начинается на 'http://'. Если это так - выведите 'да', если не так - 'нет'.
$string_task23 = 'http://mysite.com';
if(strpos($string_task23,'http:/') == 0){
    echo "\n",'да';
} else echo "\n",'нет';


//      24. Дана строка 'html css php'. С помощью функции explode запишите каждое слово этой строки
//       в отдельный элемент массива
$string_task24 = 'html css php';
var_dump($array_task24 = explode(' ',$string_task24));


//      25. Дан массив с элементами 'html', 'css', 'php'. С помощью функции implode создайте строку из этих элементов,
//       разделенных запятыми.
$array_task25 = ['html','css','php'];
var_dump($string_task25 = implode(',',$array_task25));

//      26. В переменной $date лежит дата в формате '2013-12-31'. Преобразуйте эту дату в формат '31.12.2013'.
$date_task26 = '2013-12-31';
var_dump(implode('.',array_reverse(explode('-',$date_task26))));



//      27. Дана строка '1234567890'. Разбейте ее на массив с элементами '12', '34', '56', '78', '90'.
$string_task27 = '1234567890';
var_dump(str_split($string_task27,2));

//      28. Дана строка '1234567890'. Разбейте ее на массив с элементами '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'.
$string_task28 = '1234567890';
var_dump(str_split($string_task28,1));

//      29. Дана строка '1234567890'. Сделайте из нее строку '12-34-56-78-90' не используя цикл.
$string_task29 = '1234567890';
var_dump($resultString29 = implode('-',str_split($string_task29,2)));

//      30. Дана строка. Очистите ее от концевых пробелов.
$string_task30 = ' my string ';
var_dump(trim($string_task30));

//      31. Дана строка '/php/'. Сделайте из нее строку 'php', удалив концевые слеши.
$string_task31 = '/php/';
var_dump(trim($string_task31,'/'));

//      32. Дана строка 'слова слова слова.'. В конце этой строки может быть точка, а может и не быть.
//      Сделайте так, чтобы в конце этой строки гарантировано стояла точка. То есть: если этой точки нет - ее надо добавить,
//      а если есть - ничего не делать. Задачу решите через rtrim без всяких ифов.
$string_task32 = 'string string string.';
var_dump(trim($string_task32,'.').'.');



//      33. Дана строка '12345'. Сделайте из нее строку '54321'.
$string_task33 = '12345';
var_dump(strrev($string_task33));

//      34. Проверьте, является ли слово палиндромом
//       (одинаково читается во всех направлениях, примеры таких слов: madam, otto, kayak, nun, level).
$string_task34 = 'nun';
if($string_task34 == strrev($string_task34)){
    echo 'Полиндром',"\n";
} else echo 'Не Полиндром',"\n";

//      35. Дана строка. Перемешайте символы этой строки в случайном порядке.
$string_task35 = 'My String';
var_dump(str_shuffle($string_task35));

//      36. Создайте строку из 6-ти случайных маленьких латинских букв так, чтобы буквы не повторялись.
//       Нужно сделать так, чтобы в нашей строке могла быть любая латинская буква, а не ограниченный набор.
$allCharsTask36 = 'qwertyuiopasdfghjklzxcvbnm';
var_dump(substr(str_shuffle($allCharsTask36),0,6));
echo '</pre>';


