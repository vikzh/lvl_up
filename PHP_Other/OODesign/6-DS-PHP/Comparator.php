<?php

namespace App\Comparator;

function compare($text1, $text2)
{
    $evaluatedText1 = evaluate($text1);
    $evaluatedText2 = evaluate($text2);

    return $evaluatedText1 === $evaluatedText2;
}

function evaluate($text)
{
    $stack = new \Ds\Stack();
    for ($i = 0; $i < mb_strlen($text); $i++) {
        $current = $text[$i];
        if ($current == '#') {
            $stack->pop();
        } else {
            $stack->push($current);
        }
    }

    return implode('', $stack->toArray());
}
