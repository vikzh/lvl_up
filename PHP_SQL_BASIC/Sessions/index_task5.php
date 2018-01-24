<?php
//Сделайте две страницы: index.php и form.php.
//При заходе на index.php спросите с помощью формы город и возраст пользователя.
//На form.php сделайте форму с полями 'Имя', 'Возраст', 'Город'.
//При заходе на form.php сделайте так, чтобы поля 'Возраст' и 'Город' уже были заполнены.
session_start();
if (isset($_GET['firstForm'])) {
    $_SESSION['city'] = $_GET['city'];
    $_SESSION['age'] = $_GET['age'];
}
?>
<form action="" method="get">
    <input type="text" name="city" placeholder="Город">
    <input type="text" name="age" placeholder="Возраст">
    <input type="submit" name="firstForm">
</form>
