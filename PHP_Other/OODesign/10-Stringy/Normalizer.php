<?php

use function Stringy\create as s;

function getQuestions(string $text)
{
    $lines = s($text)->lines();
    $filteredLines = collect($lines)->filter(function ($line) {
        return s($line)->endsWith('?');
    });
    return implode("\n", $filteredLines->all());
}