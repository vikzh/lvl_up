<?php
//7. Покажите пользователю баннер с кнопкой 'Не показывать больше!'.
// Если он нажмет на эту кнопку - не показывайте ему баннер в течении месяца
if (isset($_POST['hideBanner'])) {
    setcookie('hideBanner', "hide", time() + 30 * 24 * 3600);
}

if (!isset($_COOKIE['hideBanner']) && !isset($_POST['hideBanner'])) {
    ?>
    <img src="">
    <form action="" method="post">
        <input type="submit" name="hideBanner" value="Скрыть баннер">
    </form>
    <?php
}?>

