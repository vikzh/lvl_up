<h2>Реализуйте абстракцию для работы с рациональными числами включающую в себя следующие функции:

    Конструктор makeRational - принимает на вход числитель и знаменатель, возвращает дробь.
    Селектор getNumer - возвращает числитель
    Селектор getDenom - возвращает знаменатель
    Сложение add - складывает переданные дроби
    Вычитание sub - находит разность между двумя дробями
    Не забудьте реализовать нормализацию дробей удобным для вас способом
</h2>
<?php

function makeRational($numer, $denom)
{
    $gcd = gcd($numer, $denom);
    return ['numer' => $numer / $gcd, 'denom' => $denom / $gcd];
}

function getNumer($rational)
{
    return $rational['numer'];
}

function getDenom($rational)
{
    return $rational['denom'];
}

function add($rational1, $rational2)
{
    return makeRational(
        getNumer($rational1) * getDenom($rational2) + getNumer($rational2) * getDenom($rational1),
        getDenom($rational1) * getDenom($rational2)
    );
}

function sub($rational1, $rational2)
{
    return makeRational(
        getNumer($rational1) * getDenom($rational2) - getNumer($rational2) * getDenom($rational1),
        getDenom($rational1) * getDenom($rational2)
    );
}

$rat1 = makeRational(3, 9);
getNumer($rat1); // => 1
getDenom($rat1); // => 3

$rat2 = makeRational(10, 3);
add($rat1, $rat2); // => 11/3
sub($rat1, $rat2); // => -3/1
