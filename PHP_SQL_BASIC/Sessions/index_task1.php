<?php
// 1. Сделайте две страницы: index.php и test.php. При заходе на index.php спросите с помощью формы страну пользователя,
// запишите ее в сессию. При заходе на test.php выведите страну пользователя.
session_start();
if (isset($_GET['country'])) {
    $_SESSION['country'] = $_GET['country'];
}
?>

<form action="" method="get">
    <input type="text" name="country">
    <input type="submit">
</form>