<h2>
Реализуйте функцию getFirstMenWithLessFriends, которая принимает список пользователей и возвращает пользователя у которого меньше всего друзей. Если список пользователей пустой, то возвращается null.
</h2>
<?php

use Funct\Collection;

public function getFirstMenWithLessFriends($users)
{
$countOfFriends = array_reduce($users, function($acc, $user){
$acc[$user['name']] = count($user['friends']);
return $acc;
}, []);
$min = min($countOfFriends);
}

getFirstMenWithLessFriends($users);
// => ['name' => 'Bronn', 'friends' => []];

$users = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Keit', 'friends' => []],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

