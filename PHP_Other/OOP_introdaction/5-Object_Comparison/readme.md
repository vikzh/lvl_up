Реализуйте функцию compare, которая сравнивает переданных пользователей на основе идентификатора. Эта функция должна убедиться что переданные объекты - пользователи.
```php
<?php

use function App\UserFunctions\compare;

$user1 = new User();
$user1->id = 1;

$user2 = new User();
$user2->id = 1;

compare($user1, $user2); // => true

$cat = new Cat();
$user2->id = 1;

compare($user1, $cat); // => false