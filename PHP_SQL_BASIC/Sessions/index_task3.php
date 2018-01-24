<?php
//3.Спросите у пользователя email с помощью формы.
// Затем сделайте так, чтобы в другой форме (поля: имя, фамилия, пароль, email)
// при ее открытии поле email было автоматически заполнено.
session_start();
if (isset($_GET['email_form1'])) {
    $_SESSION['email'] = $_GET['email_form1'];
}
?>
<form action="" method="get">
    <input type="text" name="email_form1">
    <input type="submit">
</form>

<form action="" method="get">
    <input type="text" name="firstName">
    <input type="text" name="secondName">
    <input type="password" name="password">
    <input type="text" name="email" value="<?php if (!empty($_SESSION['email'])) {
        echo $_SESSION['email'];
    } ?>">
</form>
