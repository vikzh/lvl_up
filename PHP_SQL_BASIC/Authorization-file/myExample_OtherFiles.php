<?php
if (isset($_SESSION['auth']) && $_SESSION['auth']){
    echo "Доступ открыт";
} else {
    echo "Доступ закрыт ";
    echo '<a href=myExample.php>Авторизация</a>';
}