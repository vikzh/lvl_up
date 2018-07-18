Реализуйте функцию dup, которая клонирует переданную точку. Под клонированием подразумевается процесс создания нового объекта, с такими же данными как и у старого.
```php
<?php

use function App\PointFunctions\dup;

$point1 = new \App\Point();
$point2 = dup($point1);

$point1 == $point2; // true
$point1 === $point2; // false