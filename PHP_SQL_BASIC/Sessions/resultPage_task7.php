<?php
session_start();
if (isset($_GET['test2_form'])) {
    if (isset($_GET['answer2'])) {
        $_SESSION['test2'] = $_GET['answer2'];
    }
}
echo 'results of your test ' . '<br>';
echo '2 + 2 = ' . "$_SESSION[test1], " . '3 * 3 = ' . "$_SESSION[test2]";