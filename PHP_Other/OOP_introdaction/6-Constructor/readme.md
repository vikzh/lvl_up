Реализуйте класс App\Segment с двумя публичными свойствами beginPoint и endPoint. Определите в классе конструктор.
```
<?php

$segment = new Segment(new Point(1, 1), new Point(10, 11));
```

Реализуйте функцию reverse, которая принимает на вход сегмент и возвращает новый, с точками добавленными в обратном порядке (begin меняется местами со end). Точки должны быть клонированы.
```
<?php

use function App\SegmentFunctions\reverse;

$segment = new \App\Segment(new Point(1, 10), new Point(11, -3));
$reversedSegment = reverse($segment);

$reversedSegment->beginPoint; // => (11, -3)
$reversedSegment->endPoint; // => (1, 10)