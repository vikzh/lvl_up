<h2>Реализуйте функцию getSentenceType, которая принимает на вход текст, определяет его тип и возвращает наружу его название. Тип предложения определяется по последнему символу в тексте.

? - question
! - shouting
Все остальное - common
Если передана пустая строчка, то функция должна вернуть null.
</h2>
<?php

function getSentenceType($sentence)
{
    if ($sentence === '') {
        return null;
    }

    $types = [
        '?' => 'question',
        '!' => 'shouting'
    ];
    $symbol = \Funct\Strings\right($sentence, 1);
    return array_key_exists($symbol, $types) ? $types[$symbol] : 'common';
}

getSentenceType(''); // => null;
getSentenceType('what?'); // => question
getSentenceType('wow!'); // => shouting
getSentenceType('haha'); // => common
//Подсказки
//Funct\Strings\right