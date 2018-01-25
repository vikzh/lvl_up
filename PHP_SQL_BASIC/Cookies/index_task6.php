<?php
//6. Сделайте счетчик посещения сайта посетителем. Каждый раз, заходя на сайт
//, он должен видеть надпись: 'Вы посетили наш сайт % раз!'.
session_start();
if (empty($_COOKIE['visits'])){
    setcookie('visits', 1, time() + 3600);
} else {
    setcookie('visits', $_COOKIE['visits'] + 1, time() + 3600);
    echo $_COOKIE['visits'];
}
