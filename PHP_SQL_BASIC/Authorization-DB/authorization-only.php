<?php
//Сделайте авторизацию по таблице со следующими полями: имя, фамилия, email (+логин, пароль и другое, что нужно).
// Все задачи ниже относятся к данной таблице, если не сказано иное.
//
//Сделайте так, чтобы все данные из таблицы хранились в сессии.
//
//Сделайте функцию user, с помощью которой можно получить доступ ко всей информации о пользователе.
// Информация берется из сессии. Примеры работы: user('id') – вернет id пользователя, user('login') - вернет логин и т.д.
//
//Сделайте функцию isAuth, которая проверяет, авторизован ли пользователь. Если да - вернет true, если нет - false.
//
//Сделайте аналогичную функцию isNotAuth, которая проверят, НЕ авторизован ли пользователь.
//
//Сделайте функцию getUser($id = ''), которая параметром принимает id пользователя, а возвращает информацию из
// БД для данного пользователя. В случае вызова без параметра функция должна брать информацию из БД для
// текущего пользователя (определяется по сессии).
//
// Сделайте так, чтобы при авторизации в БД писалась дата последнего захода пользователя на сайт.
session_start();
if (isset($_POST['auth'])) {
    $host = 'localhost';
    $name = 'root';
    $password = 'root';
    $db_name = 'auth';
    $connect = mysqli_connect($host, $name, $password, $db_name) or die($connect);
    $userQuery = "SELECT * FROM users WHERE login = '$_POST[login]' AND password = '$_POST[password]'";
    if ($result = mysqli_query($connect, $userQuery)) {
        $users = mysqli_fetch_assoc($result);
        if (!empty($users)) {
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $users['id'];
            $_SESSION['login'] = $users['login'];
            $_SESSION['email'] = $users['email'];
            $updateDateUserQuery = "UPDATE users SET update_time = 'time()'";
            if (mysqli_query($connect, $updateDateUserQuery)) {
                echo "welcome";
            } else {
                echo "Error date update: " . mysqli_error($connect);
            }
        } else {
            echo "login or password incorrect";
        }
    } else {
        echo 'Error: ' . mysqli_error($connect);
    }
}
function user ($par) {
    if (isset($_SESSION[$par])){
        return $_SESSION[$par];
    } else {
        return false;
    }
}
function isAuth($login){
    if(isset($_SESSION['login'])){
        return $_SESSION['login'] == $login;
    }
}
function notAuth($login){
    if(isset($_SESSION['login'])){
        return $_SESSION['login'] != $login;
    }
}
function getUset($id){
    $takeUserQuery = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connect,$takeUserQuery);
    return mysqli_fetch_assoc($result);
}
?>
<?php
if (!isset($_SESSION['auth'])) {
    ?>
    <form action="" method="post">
        <input type="text" name="login" placeholder="login">
        <input type="password" name="password">
        <input type="submit" value="Submit" name="auth">
    </form>
    <?php
}
?>
