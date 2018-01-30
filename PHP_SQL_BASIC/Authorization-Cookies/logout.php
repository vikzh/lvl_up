<?php
if (isset($_SESSION['auth']) && $_SESSION['auth']){
    session_start();
    session_destroy();

    setcookie('id','',time());
    setcookie('login','',time());
    setcookie('key','',time());
}