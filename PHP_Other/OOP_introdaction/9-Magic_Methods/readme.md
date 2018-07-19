Реализуйте функцию __toString, которая преобразует сегмент к строке в соответствии с примером ниже [(1, 10)]
```
<?php

$point1 = new Point(1, 10);
$point2 = new Point(11, -3);
$segment1 = new Segment($point1, $point2);
print_r($segment1); // => [(1, 10), (11, -3)]

$segment2 = new Segment($point2, $point1);
print_r($segment2); // => [(11, -3), (1, 10)]