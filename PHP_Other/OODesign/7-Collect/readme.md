Конструктор класса принимает на вход массив в котором перечислены номиналы карт в единственном экземпляре, например, [6, 7, 8, 9, 10, 'king']. Затем, с помощью, метода getShuffled можно получить полную колоду (то есть такую колоду, в которой каждая карта встречается 4 раза. Для простоты не учитываем масть) в виде массива отсортированную случайным образом.

```php
<?php

$deck = new DeckOfCards([2, 3]);
$deck->getShuffled(); // [2, 3, 3, 3, 2, 3, 2, 2]
$deck->getShuffled(); // [3, 3, 2, 2, 2, 3, 3, 2]
```
- Используйте функцию collect для оборачивания массивов