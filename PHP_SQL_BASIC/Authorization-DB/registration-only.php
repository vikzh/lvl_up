<?php
//Сделайте регистрацию пользователя, которая запрашивает от него следующие поля: имя, фамилия, возраст, email, город, язык. Все задачи ниже относятся к данной регистрации, если не сказано иное.
//
//Реализуйте проверку логина на незанятость.
//
//Пусть при регистрации скрипт сохраняет дату регистрации (пользователь не вводит эти данные, дата определяется сама скриптом PHP).
//
//Сделайте скрипт-генератор паролей. Пароль должен быть минимум 6 символов. Интегрируйте этот скрипт в нашу регистрацию - пусть пользователю будет предложено сгенерировать пароль.
//
//Сделайте так, чтобы пользователь не сам вводил язык, а мог выбрать его из выпадающего списка.
session_start();
function generatePassword()
{
    $password = '';
    for ($i = 0; $i < 6; $i++) {
        $password .= myRandom(mt_rand(1, 3));
    }
    return $password;
}

function myRandom($number)
{
    switch ($number) {
        case 1:
            return mt_rand(0, 9);
            break;
        case 2:
            return chr(mt_rand(65, 90));
            break;
        case 3:
            return chr(mt_rand(97, 122));
            break;
    }
}

if (isset($_POST['register'])) {
    if (isset($_POST['password']) && isset($_POST['repeat_password']) && $_POST['password'] == $_POST['repeat_password']) {
        if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['first_name']) && isset($_POST['second_name'])
            && isset($_POST['language'])) {
            $host = 'localhost';
            $name = 'root';
            $password = 'root';
            $db_name = 'auth';
            $link = mysqli_connect($host, $name, $password, $db_name) or die(mysqli_query($link));
            $checkLoginQuery = "SELECT login FROM users WHERE login = '$_POST[login]'";
            $loginResult = mysqli_query($link, $checkLoginQuery);
            if (!$login = mysqli_fetch_assoc($loginResult)) {
                if (isset($_POST['genPass'])) {
                    $_POST['password'] = generatePassword();
                }
                $registerQuery = "INSERT INTO users SET email = '$_POST[email]', login = '$_POST[login]', password = '$_POST[password]',
first_name = '$_POST[first_name]', second_name = '$_POST[second_name]', language = '$_POST[language]'";
                if (!mysqli_query($link, $registerQuery)) {
                    echo 'Error in reg: ' . mysqli_error($link);
                } else {
                    echo "welcome";
                    $_SESSION['auth'] = true;
                }
            } else {
                echo "login taken";
            }
        }
    } else {
        echo "incorrect passwords";
    }
}
?>
<?php
if (empty($_SESSION['auth'])) {
    ?>
    <form action="" method="post">
        <input type="text" name="first_name" placeholder="first_name">
        <input type="text" name="second_name" placeholder="second_name">
        <input type="email" name="email" placeholder="email">
        <input type="text" name="login" placeholder="login">
        <input type="password" name="password" placeholder="password">
        <input type="password" name="repeat_password" placeholder="repeat your password">
        <select name="language">
            <option>Russ</option>
            <option>ENG</option>
            <option>BLR</option>
            <option>PL</option>
        </select>
        <input type="checkbox" name="genPass">
        <input type="submit" name="register" value="register">
    </form>
    <?php
}
?>
