<?php
session_start();
if (isset($_GET['firstTest'])) {
    if (isset($_GET['answer1'])) {
        $_SESSION['test1'] = $_GET['answer1'];
    }
}
?>
<p>3*3?</p>
<form action="resultPage_task7.php" method="get">
    <input type="radio" name="answer2" value="6" checked>
    <input type="radio" name="answer2" value="9">
    <input type="submit" name="test2_form">
</form>
