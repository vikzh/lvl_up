<?php
//4.Сделайте счетчик обновления страницы пользователем. Данные храните в сессии.
// Скрипт должен выводить на экран количество обновлений.
// При первом заходе на страницу он должен вывести сообщение о том, что вы еще не обновляли страницу.
session_start();
if (empty($_SESSION['page_reload'])) {
    echo "Вы заходите на страницу первый раз";
    $_SESSION['page_reload'] = 1;
} else {
    $_SESSION['page_reload']++;
    echo $_SESSION['page_reload'];
}