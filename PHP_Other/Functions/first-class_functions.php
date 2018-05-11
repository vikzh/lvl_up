<h2>Реализуйте функцию takeOldest, которая принимает на вход список пользователей и возвращает самых взрослых.
    Количество возвращаемых пользователей задается вторым параметром, который по-умолчанию равен единице.
</h2>
<?php
$users = [
    ['name' => 'Tirion', 'birthday' => '1988-11-19'],
    ['name' => 'Sam', 'birthday' => '1999-11-22'],
    ['name' => 'Rob', 'birthday' => '1975-01-11'],
    ['name' => 'Sansa', 'birthday' => '2001-03-20'],
    ['name' => 'Tisha', 'birthday' => '1992-02-27']
];

function takeOldest(array $users, int $count = 1)
{
    usort($users, function ($user1, $user2) {
        return strtotime($user1['birthday']) >= strtotime($user2['birthday']) ? 1 : -1;
    });

    return firstN($users, $count);
}

takeOldest($users);
# => Array (
#   ['name' => 'Rob', 'birthday' => '1975-01-11']
# )
//Подсказки
//Для преобразования даты в unixtimetamp используйте функцию strtotime
//firstN
//usort