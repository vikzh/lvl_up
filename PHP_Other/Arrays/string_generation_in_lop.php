<div class="card-text hexlet-theory-body">


    <p>Генерация строк в циклах, задача часто возникающая на практике. Типичный пример в вебе, функция-хелпер помогающая
        генерировать html списки в шаблонах. Она принимает на вход коллекцию элементов и возвращает список из них:</p>

    <code class="php hljs">
        $coll = ['milk', 'butter', 'eggs', 'bread'];
        buildList($coll);
        // =>
        <ul>
            <li>milk</li>
            <li>butter</li>
            <li>eggs</li>
            <li>bread</li>
        </ul>
    </code>

    <p>Самый примитивный алгоритм, который приходит в голову. Пройтись циклом по элементам коллекции и дописать в
        результирующую строку очередной <code>li</code> элемент. В начале и конце добавить <code>ul</code> и вернуть
        строчку наружу.</p>

    <code class="php hljs">
        $result = '';
        foreach ($coll as $item) {
        $result .= "
        <li>{$item}</li>
        ";
        // либо так
        // $result = "{$result}
        <li>{$item}</li>
        ";
        }
        $result = "
        <ul>{$result}</ul>
        ";
    </code>

    <p>Такой способ вполне рабочий, но для большинства языков программирования максимально не эффективный. Дело в том
        что конкатенация и интерполяция, порождают новую строчку вместо старой и подобная ситуация повторяется на каждой
        итерации. Причем строка становится все больше и больше. Копирование строк приводит к серьезному расходу памяти и
        может влиять на производительность. Конечно для большинства приложений данная проблема не актуальна из за малого
        объема прогоняемых данных, но более эффективный подход не сложнее в реализации и обладает дополнительными
        плюсами. Поэтому стоит сразу приучить себя работать правильно и никогда больше не возращаться к этом вопросу. В
        статических языка для подобной цели используется, так называемый <a
                href="http://wiki.c2.com/?StringBufferExample" target="_blank">String Buffer</a>. В динамических -
        обычный массив. Перепишем программу выше используя новое знание:</p>

    <code class="php hljs">
        $parts = []; // переименовал для того чтобы не менять значения переменной
        foreach ($coll as $item) {
        $parts[] = "
        <li>{$item}</li>
        ";
        }
        $innerValue = implode(' ', $parts);
        $result = "
        <ul>{$innerValue}</ul>
        ";
    </code>

    <p>Как видите код не сильно поменялся. Разница в том что теперь собирается массив вместо строки и в конце он
        собирается в строку с помощью <code>implode</code>. Помимо эффективности у такого подхода есть дополнительные
        плюсы:</p>

    <ul>
        <li>Такой код проще отлаживать и анализировать внутренности</li>
        <li>Массив можно дообработать если надо, а строчку уже нет</li>
    </ul>


    <h4 class="mb-4">Дополнительные материалы</h4>
    <ol>
        <li class="lead">
            <a target="_blank" href="http://russian.joelonsoftware.com/Articles/BacktoBasics.html">Назад к основам
                (Джоэль Спольски)</a>
        </li>
    </ol>
</div>

<h2>
    Реализуйте функцию buildDefinitionList, которая генерирует html список определений (dd) и возвращает получившуюся
    строку. Аргументы:

    Список определений следующего формата:
</h2>
<?php
function buildDefinitionList(array $definitions)
{
    $parts = [];
    foreach ($definitions as $definition) {
        $name = $definition[0];
        $description = $definition[1];
        $parts[] = "<dt>{$name}</dt><dd>{$description}</dd>";
    }
    $innerValue = implode($parts, '');
    $result = "<dl>{$innerValue}</dl>";

    return $result;
}

$definitions = [
    ['definition1', 'description1'],
    ['definition2', 'description2']
];

$definitions = [
    ['key', 'value'],
    ['key2', 'value2']
];
buildDefinitionList($definitions);
// => '<dl><dt>key</dt><dd>value</dd><dt>key2</dt><dd>value2</dd></dl>';
