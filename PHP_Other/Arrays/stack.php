<h2>Реализуйте функцию checkIfBalanced, которая проверяет балансировку круглых скобок в арифметических выражениях.
</h2>
<?php

function checkIfBalanced(string $expression): bool
{
    // инициализируем стек
    $stack = [];
    for ($i = 0; $i < strlen($expression); $i++) {
        $curr = $expression[$i];
        if ($curr == '(') {
            array_push($stack, $curr);
        } elseif ($curr == ')') {
            if (empty($stack)) {
                return false;
            }
            array_pop($stack);
        };
    }

    // Если стек оказался пустой после обхода строки, то значит все хорошо
    return sizeof($stack) == 0;
}

checkIfBalanced('(5 + 6) * (7 + 8)/(4 + 3)'); // => true
checkIfBalanced('(4 + 3))'); // => false