<?php
//8. Запомните дату последнего посещения сайта пользователем.
// При заходе на сайт напишите ему, сколько дней он не был на вашем сайте.
if (isset($_COOKIE['visit_day'])){
$numOfDays = date('d:s',time() - $_COOKIE['visit_day']);
}
setcookie('visit_day',time(),time() + 30 * 24 * 3600);
if (!isset($numOfDays)){
    echo "Вы первай раз на сайте";
} else {
    echo $numOfDays;
}


