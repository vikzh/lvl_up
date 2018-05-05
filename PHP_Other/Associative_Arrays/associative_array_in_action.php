Обращение к вложенным массивам выглядит просто только, когда мы уверенны в наличие всех ключей, попадающихся по пути:

<?php

$data = [
    'a' => [
        'b' => [
            'c' => 'wow'
        ]
    ]
];

$data['a']['b']['c']; // => wow
//Если же наличие данных ключей в массиве не обязательно, тогда код резко усложняется. Каждая попытка обратиться внутрь должна сопровождаться проверкой:


if (array_key_exists('a', $data)) {
    $inner1 = $data['a'];
    if (array_key_exists('b', $inner1)) {
        $inner2 = $inner1['b'];
        if (array_key_exists('c', $inner2)) {
            // ...
        }
    }
}

//Реализуйте функцию getIn, которая извлекает из массива, с любой глубиной вложенности, значение по указанным ключам. Аргументы:

//Исходный массив
//Массив ключей, по которым ведется поиск значения
//В случае, когда добраться до значения невозможно, то возвращается null

$data = [
    'user' => 'ubuntu',
    'hosts' => [
        ['name' => 'web1'],
        ['name' => 'web2']
    ]
];

function getIn(array $data, array $keys)
{
    $current = $data;
    foreach ($keys as $key) {
        if (!is_array($current) || !array_key_exists($key, $current)) {
            return null;
        }

        $current = $current[$key];
    }

    return $current;
}

getIn($data, ['undefined']); // => null
getIn($data, ['user']); // => 'ubuntu'
getIn($data, ['user', 'ubuntu']); // => null
getIn($data, ['hosts', 1, 'name']); // => 'web2'
getIn($data, ['hosts', 0]); // => ['name' => 'web1']