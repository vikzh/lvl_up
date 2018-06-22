<h2>Реализуйте функцию getGirlFriends, которая принимает на вход список пользователей и возвращает плоский список подруг
    всех пользователей (без сохранения ключей). Друзья каждого пользователя хранятся в виде массива в ключе friends. Пол
    доступен по ключу gender и может принимать значения male или female.
</h2>
<?php

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
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

//better solution
use function \Funct\Collection\flatten;
function getGirlfriends(array $users)
{
    $friends = array_map(function ($user) {
        return $user['friends'];
    }, $users);
    $friends = flatten($friends);

    $girlfriends = array_filter($friends, function ($user) {
        return $user['gender'] === 'female';
    });
    return array_values($girlfriends);
}

//my - without flatten
function getGirlFriends2($users)
{
    $friends_array = array_map(function($user){
        return $user['friends'];
    },$users);
    $friends = [];
    foreach($friends_array as $friend)
    {
        foreach($friend as $fr)
        {
            $friends[] = $fr;
        }
    }
    $girls = array_filter($friends,function($friend){
        if(isset($friend['gender'])){
            return $friend['gender'] === 'female';
        } else {
            return false;
        }
    });
    return array_values($girls);
}

getGirlFriends($users);
# => Array (
#      ['name' => 'Mira', 'gender' => 'female'],
#      ['name' => 'Aria', 'gender' => 'female'],
#      ['name' => 'Keit', 'gender' => 'female']
# )