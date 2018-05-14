<h2>Реализуйте функцию sayPrimeOrNot, которая проверяет переданное число на простоту и печатает на экран yes или no.
</h2>
<?php

function isPrime(int $num)
{
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}

function sayPrimeOrNot($num)
{
    $text = isPrime($num) ? 'yes' : 'no';
    print_r($text);
}

sayPrimeOrNot(5); // => yes
sayPrimeOrNot(4); // => no
//Подсказки
//Цель этой задачи научиться отделять чистый код от кода с побочными эффектами