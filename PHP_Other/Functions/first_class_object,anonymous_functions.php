<h2>
    Реализуйте анонимную функцию, которая принимает на вход строку и возвращает ее последний символ (или null если
    строка пустая). Запишите созданную функцию в переменную $last.
</h2>
<?php
$last = function (string $text) {
    if ($text === '') {
        return null;
    }
    return $text[strlen($text) - 1];
};