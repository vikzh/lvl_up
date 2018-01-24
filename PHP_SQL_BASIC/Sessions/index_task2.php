<?php
//2. Запишите в сессию время захода пользователя на сайт.
// При обновлении страницы выводите сколько секунд назад пользователь зашел на сайт.
session_start();
if (!empty($_SESSION['time'])) {
    $lateTime = $_SESSION['time'];
    echo time() - $lateTime;
}
$_SESSION['time'] = time();
