<?php

// 1. Спросите имя пользователя с помощью формы. Результат запишите в переменую $name.
// Выведите на экран фразу 'Привет, %Имя%'
?>
<form action="" method="get">
    <input type="text" name="name">
    <input type="submit">
</form>

<?php
$name_task1 = $_REQUEST['name'];
var_dump($name_task1);

// 2. Спросите у пользователя имя, возраст, а также попросите его ввести сообщение (его сделайте в textarea).
// Выведите эти данные на экран в формате, приведенном под данной задачей.
// Позаботьтесь о том, чтобы пользователь не мог вводить теги (просто удаляйте их) и таким образом сломать сайт.
?>
<form action="" method="get">
    <input type="text" name="name_task2">
    <input type="text" name="age_task2">
    <textarea name="user_text_task2"></textarea>
    <input type="submit">
</form>
<?php
$name_task2 = strip_tags($_REQUEST['name_task2']);
$age_task2 = strip_tags($_REQUEST['age_task2']);
$user_text_task2 = strip_tags($_REQUEST['user_text_task2']);
?>
<div><?php echo "Привет: ", $name_task2, " $age_task2<br>";
    echo "Твой текст:", $user_text_task2; ?>
</div>
<?php
// 3. Спросите возраст пользователя. Если форма была отправлена и введен возраст, то выведите его на экран,
// а форму уберите. Если же форма не была отправлена (это будет при первом заходе на страницу) - просто покажите ее
if (!isset($_REQUEST['age_task3'])) {
    ?>
    <form action="" method="get">
        <input type="text" name="age_task3">
        <input type="submit">
    </form>
    <?php
} else {
    $userAge_task3 = strip_tags($_REQUEST['age_task3']);
    echo "<p>$userAge_task3</p>";
} ?>
<?php
// 4. Спросите у пользователя логин и пароль (в браузере должен быть звездочками).
// Сравните их с логином $login и паролем $pass, хранящихся в файле.
// Если все верно - выведите 'Доступ разрешен!', в противном случае - 'Доступ запрещен!'.
// Сделайте так, чтобы скрипт обрезал концевые пробелы в строках, которые ввел пользователь.
?>
<form action="" method="post">
    <input type="text" name="name_task4">
    <input type="password" name="pass_task4">
    <input type="submit">
</form>
<?php
$login_task4 = 'admin';
$pass_task4 = 'admin';
if (isset($_REQUEST['name_task4']) && isset($_REQUEST['pass_task4'])) {
    $formLogin_task4 = trim($_REQUEST['name_task4']);
    $formPass_task4 = trim($_REQUEST['pass_task4']);
    if ($formLogin_task4 == $login_task4 && $formPass_task4 == $pass_task4) {
        echo "<p>Доступ Разрешен</p>";
    } else echo "<p>Доступ Запрещен</p>";
}

// 5. Спросите имя пользователя с помощью формы. Результат запишите в переменную $name.
// Сделайте так, чтобы после отправки формы значения ее полей не пропадали
?>
<?php
if (isset($_REQUEST['name_task5'])) {
    $name_task5 = $_REQUEST['name_task5'];
    echo "<p>$name_task5</p>";
}
?>
<form action="" method="get">
    <input type="text" name="name_task5" value="<? if (isset($name_task5)) echo $name_task5; ?>">
    <input type="submit">
</form>
<?php
// 6. Спросите у пользователя имя, а также попросите его ввести сообщение (textarea).
// Сделайте так, чтобы после отправки формы значения его полей не пропадали
?>
<form action="" method="get">
    <input type="text" name="name_task6" value="<? if (isset($_GET['name_task6'])) echo $_GET['name_task6']; ?>">
    <textarea name="text_task6">
        <?php
        if (isset($_GET['text_task6'])) echo $_GET['text_task6'];
        ?>
    </textarea>
    <input type="submit" name="submit_task6">
</form>
