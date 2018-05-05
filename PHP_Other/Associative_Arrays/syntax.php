<h2>Обратите внимание на сходство json и ассоциативного массива. Оно не случайно. Json, является представлением
    ассоциативного массива в текстовом виде. Composer, во время каждого запуска считывает этот файл.

    src\Arrays.php
    Реализуйте функцию getComposerFileData, которая возвраащет ассоциативный массив, соответствующий json из файла
    composer.json в этом упражнении. Все что вам нужно сделать, посмотреть на содержимое composer.json и руками
    сформировать массив аналогичной структуры.
</h2>

<?php
//composer.json
//{
//    "autoload": {
//    "files": [
//        "src/Arrays.php"
//    ]
//  },
//  "config": {
//    "vendor-dir": "/composer/vendor"
//  }
//}

function getComposerFileData()
{
    return [
        "autoload" => [
            "files" => [
                "src/Arrays.php"
            ]
        ],
        "config" => [
            "vendor-dir" => "/composer/vendor"
        ]
    ];
}

