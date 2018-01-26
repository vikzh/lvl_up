<?php
//Сделайте так, чтобы при авторизации нужно было вводить не только пароль, но и логин. Логин отличается от пароля тем,
// что показывается открыто (а не звездочками) и в файле также хранится открыто.
//
//Сделайте так, чтобы при авторизации нужно было вводить два пароля.
//
//Придумайте и реализуйте свой алгоритм хеширования. У нас был просто md5 от пароля,
// но можно делать различные комбинации, например: md5($login.$password) или md5($login.md5($password)).
//
//Сделайте так, чтобы при авторизации нужно было вводить логин, пароль и длинную кодовую строку (осмысленный длинный текст).
//
//Сделайте авторизацию по паролю, при условии определенного ip пользователя.
// Подсказка: ip пользователя лежит здесь $_SERVER['REMOTE_ADDR'].
//
//Сделайте авторизацию по паролю, при условии определенного браузера пользователя.
// Подсказка: браузер пользователя лежит здесь $_SERVER['HTTP_USER_AGENT'].

//my hash md5(str_shuffle(md5($password)));
session_start();
$login = 'admin';
$password = '827ccb0eea8a706c4c34a16891f84e7b';
$codeString = 'Lorem Ipsum is simply dummy text of the printing and';
$arrOfCodes = explode(' ', $codeString);
$secretCode = $arrOfCodes[mt_rand(0, 9)] . ' ' . $arrOfCodes[mt_rand(0, 9)] . ' ' . $arrOfCodes[mt_rand(0, 9)];
if (isset($_SESSION['sec'])) {
    $currentSecret = $_SESSION['code'];
    $_SESSION['code'] = $secretCode;
} else {
    $currentSecret = false;
    $_SESSION['code'] = $secretCode;
}
if (isset($_POST['password']) && md5($_POST['password']) == $password && isset($_POST['login']) && $_POST['login'] == $login || ($_SERVER['REMOTE_ADDR'] == '::1' && $_SERVER['HTTP_USER_AGENT'] == 'Chrome/63.0.3239')) {
    if (isset($_POST['code']) && $_POST['code'] == $currentSecret) {
        echo "Доступ открыт";
        $_SESSION['auth'] = true;
    } else {
        echo "test code innc\n";
    }
} else {
    if (isset($_POST['password']) && md5($_POST['password']) != $password && isset($_POST['login']) && $_POST['login'] != $login) {
        echo "Неверный пароль или логин ";
    }
    ?>
        <form action="" method="post">
            <input type="text" name="login" placeholder="login">
            <input type="password" name="password" placeholder="password">
            <input type="text" name="code" placeholder="code" value="<?php echo $currentSecret;?>">
            <input type="submit">
        </form>
    <?php
}
?>

