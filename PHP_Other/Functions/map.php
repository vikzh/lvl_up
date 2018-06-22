<h2>Реализуйте функцию getChildren, которая принимает на вход список пользователей и возвращает плоский список их детей.
    Дети каждого пользователя хранятся в виде массива в ключе children
</h2>
<?php

$users = [
    ['name' => 'Tirion', 'children' => [
        ['name' => 'Mira', 'birdhday' => '1983-03-23']
    ]],
    ['name' => 'Bronn', 'children' => []],
    ['name' => 'Sam', 'children' => [
        ['name' => 'Aria', 'birdhday' => '2012-11-03'],
        ['name' => 'Keit', 'birdhday' => '1933-05-14']
    ]],
    ['name' => 'Rob', 'children' => [
        ['name' => 'Tisha', 'birdhday' => '2012-11-03']
    ]],
];

getChildren($users);
// [
//     ['name' => 'Mira', 'birdhday' => '1983-03-23'],
//     ['name' => 'Aria', 'birdhday' => '2012-11-03'],
//     ['name' => 'Keit', 'birdhday' => '1933-05-14'],
//     ['name' => 'Tisha', 'birdhday' => '2012-11-03']
// ]

use function \Funct\Collection\flatten;

function getChildren(array $users)
{
    $children = array_map(function ($user) {
        return $user['children'];
    }, $users);

    return flatten($children);
}

//my - without flatten
function getChildren1($users)
{
    $callback = function($user){
        return $user['children'];
    };

    $children = array_map($callback,$users);
    $result = [];
    foreach($children as $child)
    {
        if(count($child > 0))
        {
            foreach($child as $elem)
            {
                $result[] = $elem;
            }
        }
    }
    return $result;
}