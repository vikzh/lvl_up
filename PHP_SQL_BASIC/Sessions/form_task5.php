<?php
session_start();
?>

<form action="" method="get">
    <input type="text" value="<?php if (!empty($_SESSION['name'])) {
        echo $_SESSION['name'];
    } ?>" placeholder="Имя">
    <input type="text" value="<?php if (!empty($_SESSION['age'])) {
        echo $_SESSION['age'];
    } ?>" placeholder="Возраст">
    <input type="text" value="<?php if (!empty($_SESSION['city'])) {
        echo $_SESSION['city'];
    } ?>" placeholder="Город">
    <input type="submit">
</form>
