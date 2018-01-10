<?php
echo '<pre>'
//1. Спросите у пользователя имя с помощью формы.
// Сделайте чекбокс: если он отмечен, то поприветствуйте пользователя, если не отмечен - попрощайтесь с пользователем.
?>
    <form>
        <input type="checkbox" name="check_task1">
        <input type="submit">
    </form>
<?php
if (isset($_REQUEST['check_task1'])) {
    if ($_REQUEST['check_task1'] == 1) {
        echo "Здравствуй", "\n";
    } else {
        echo "Прощай", "\n";
    }
}

//2. Спросите у пользователя, какие из языков он знает: html, css, php, javascript.
// Выведите на экран те языки, которые знает пользователь
?>
    <form>
        <input type="checkbox" value="html" name="task2[]">
        <input type="checkbox" value="css" name="task2[]">
        <input type="checkbox" value="php" name="task2[]">
        <input type="checkbox" value="javascript" name="task2[]">
        <input type="submit">
    </form>
<?php
if (isset($_REQUEST['task2'])) {
    var_dump($_REQUEST['task2']);
}

//3. Спросите у пользователя знает ли он PHP с помощью двух radio-кнопок.
// Выведите результат на экран. Сделайте так, чтобы по умолчанию один из вариантов был уже отмечен
?>
    <form>
        <input type="radio" name="php_task3" value="yes" checked>
        <input type="radio" name="php_task3" value="no">
        <input type="submit">
    </form>
<?php
if (isset($_REQUEST['php_task3'])) {
    echo $_REQUEST['php_task3'], "\n";
}

//4. Спросите у пользователя его возраст с помощью нескольких radio-кнопок.
// Варианты ответа сделайте такими: менее 20 лет, 20-25, 26-30, более 30
?>
    <form>
        <input type="radio" value="20" name="age_task4">
        <input type="radio" value="20-25" name="age_task4">
        <input type="radio" value="26-30" name="age_task4">
        <input type="radio" value=">30" name="age_task4">
        <input type="submit">
    </form>
<?php
if (isset($_REQUEST['age_task4'])) {
    echo $_REQUEST['age_task4'], "\n";
}

//5. Спросите у пользователя его возраст с помощью select.
// Варианты ответа сделайте такими: менее 20 лет, 20-25, 26-30, более 30
?>
    <form>
        <select name="age_task5">
            <option>20</option>
            <option>20-25</option>
            <option>26-30</option>
            <option>>30</option>
        </select>
        <input type="submit">
    </form>
<?php
if (isset($_REQUEST['age_task5'])) {
    var_dump($_REQUEST['age_task5']);
}

//6.  Спросите у пользователя с помощью мультиселекта, какие из языков он знает: html, css, php, javascript.
// Выведите на экран те языки, которые знает пользователь
?>
    <form>
        <select multiple name="languages_task6[]">
            <option>html</option>
            <option>css</option>
            <option>php</option>
            <option>javascript</option>
        </select>
        <input type="submit">
    </form>
<?php
if (isset($_REQUEST['languages_task6'])) {
    var_dump($_REQUEST['languages_task6']);
}

//7. Сделайте функцию, которая создает обычный текстовый инпут.
// Функция должна иметь следующие параметры: type, name, value
function createInput($type, $name, $value)
{
    return "<input type='$type' name='$name' value='$value'>";
}

echo createInput('text', 'task_7', 'task_7'), "\n";

//8. Модифицируйте функцию из предыдущей задачи так, чтобы она сохраняла значение инпута после отправки

function createInput_task8($type, $name, $value)
{
    if (isset($_REQUEST["$name"])) {
        $value = $_REQUEST["$name"];
    }
    return "<input type='$type' name='$name' value='$value'>";
}

echo createInput('text', 'task_8', 'task_8'), "\n";

//9. Сделайте функцию, которая создает чекбокс.
// Если чекбокс не отмечен - функция должна отправлять 0 (то есть нужно сделать hidden инпут), если отмечен - 1.

function createCheckBox($name)
{
    return "<input type='hidden' name='$name' value='0'> <input type='checkbox' name='$name' value='1'>";
}

echo createCheckBox('task_9');


//10.  Напишите функцию, которая создает чекбокс и сохраняет его значение после отправки.
function createCheckBox_task10($name)
{
    if (isset($_REQUEST[$name]) and $_REQUEST[$name] == 1) {
        $value = 'checked';
    } else {
        $value = '';
    }
    return '<input type="hidden" name="' . $name . '" value="0">
		<input type="checkbox" name="' . $name . '" value="1" ' . $value . '>';
}

echo createCheckBox('task_10');
echo '</pre>';
