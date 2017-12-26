<?php

//1  Сделайте функцию, которая принимает строку на русском языке, а возвращает ее транслит
function translitString($str){
    $tr = array(
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
        "Д"=>"D","Е"=>"E","Ё"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
        "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
        "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
        "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
        "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
        "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"
    );
    return strtr($str,$tr);
}
var_dump(translitString('Виктор'));


// 2. Сделайте функцию, которая возвращает множественное или единственное число существительного. Пример: 1 яблоко,
// 2 (3, 4) яблока, 5 яблок. Функция первым параметром принимает число,
// а следующие 3 параметра — форма для единственного числа, для чисел два, три, четыре и для чисел, больших четырех,
// например, func(3, 'яблоко', 'яблока', 'яблок').

function oneOrMany($col,$oneName, $lessThanFive, $moreThanFour){
    if ( $col > 20 ) {
        $col = substr( $col, -1 );
    }
    switch ($col){
        case 0 :
            echo  $moreThanFour,"\n";
            break;
        case 1 :
            echo $oneName,"\n";
            break;
        case  $col > 1 && $col <=4 :
            echo $lessThanFive,"\n";
            break;
        case $col >= 10 && $col <= 20:
            echo $moreThanFour,"\n";
            break;
        default :
            echo $moreThanFour,"\n";
    }
}

oneOrMany(21,'Яблоко','Яблока','Яблок');


// 3. Найдите все счастливые билеты. Счастливый билет - это билет,
// в котором сумма первых трех цифр его номера равна сумме вторых трех цифр его номера.

function createTicket(){
    $ticket = '';
    for($i = 1; $i <= 6; $i++){
        $ticket.= rand(1,6);
    }
    return $ticket;
}
function checkTicket($ticket){
   $firstThreeNumbers = substr($ticket,0,3);
   $lastThreeNumbers = substr($ticket,-3);
   $sumOfFirstNumbers = array_sum(str_split($firstThreeNumbers));
   $sumOfLastNumbers = array_sum(str_split($lastThreeNumbers));
   if($sumOfFirstNumbers == $sumOfLastNumbers){
       echo "\n",'You Won';
   } else echo "\n",'Sry....:(';
}
checkTicket(createTicket());



// 4. Дружественные числа - два различных числа,
// для которых сумма всех собственных делителей первого числа равна второму числу и наоборот,
// сумма всех собственных делителей второго числа равна первому числу.

//Например, 220 и 284. Делители для 220 это 1, 2, 4, 5, 10, 11, 20, 22, 44, 55 и 110,
// сумма делителей равна 284. Делители для 284 это 1, 2, 4, 71 и 142, их сумма равна 220.

//Задача: найдите все пары дружественных чисел в промежутке от 1 до 10000. Для этого сделайте вспомогательную функцию,
// которая находит все делители числа и возвращает их в виде массива. Также сделайте функцию,
// которая параметром принимает массив, а возвращает его сумму.

function findDividers($number){
    $dividers = [];
    for($i = 1; $i < $number; $i++){
        if($number % $i == 0) {
            $dividers[] = $i;
        }
    }
    return $dividers;
}

function takeSum($arr){
    $sum = 0;
    foreach ($arr as $element){
        $sum += $element;
    }
    return $sum;
}

function checkFriendlyNumbers($firstNumber, $secondNumber){
    $dividersFirstNumber = findDividers($firstNumber);
    $dividersSecondNumber = findDividers($secondNumber);
    $sumDividersFirstNumber = takeSum($dividersFirstNumber);
    $sumDividersSecondNumber = takeSum($dividersSecondNumber);
    if($sumDividersFirstNumber == $secondNumber && $sumDividersSecondNumber == $firstNumber){
        echo  "\n",'Дружественные числа';
    } else echo "\n",'Не Дружественные';
}
checkFriendlyNumbers(220,284);