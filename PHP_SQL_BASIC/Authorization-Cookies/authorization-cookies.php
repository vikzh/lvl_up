<?php
//Реализуйте в авторизации галочку 'Запомнить меня'.
//
//Сделайте так, чтобы в случае ошибочного ввода пары логин-пароль значение логина не стиралось и галочка
// 'Запомнить меня' оставалась в том же состоянии.
//
//Реализуйте логаут (выход пользователя из своего аккаунта).
//
// Реализуйте запоминание даты последнего посещения через куки.
session_start();

function genSalt()
{
    $salt = '';
    for ($i = 0; $i < 8; $i++) {
        $salt .= chr(mt_rand(33, 126));
    }
    return $salt;
}

function dbConnection($host = 'localhost', $user = 'root', $pass = 'root', $db_name = 'regAuth')
{
    $connect = new mysqli($host, $user, $pass, $db_name);
    if ($connect->connect_error) {
        die('connection fail ' . $connect->connect_error);
    }
    return $connect;
}
if (empty($_SESSION['auth']) || $_SESSION['auth'] == false){
    if (isset($_COOKIE['login']) && isset($_COOKIE['key'])){
        $connect = dbConnection();
        $login = $_COOKIE['login'];
        $key = $_COOKIE['key'];
        $selectCookieQuery = "SELECT * FROM users WHERE login = '$login' AND key = '$key'";
        if ($cookieResult = $connect->query($selectCookieQuery)){
            if ($cookieResult->num_rows > 0){
                $user = $cookieResult->fetch_assoc();
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['login'] = $user['login'];
                $time = time();
                $cookieAuthDate = "UPDATE users SET useCookieDate = '$time'";
                $connect->query($cookieAuthDate);
            }
        }

    }
}
if (isset($_POST['auth'])) {
    if (isset($_POST['auth_login']) && isset($_POST['auth_password'])) {
        $connect = dbConnection();
        $login = $_POST['auth_login'];
        $password = $_POST['auth_password'];
        $takeUserQuery = "SELECT * FROM users WHERE login = '$login'";
        if ($users = $connect->query($takeUserQuery)) {
            if ($users->num_rows > 0) {
                $user = $users->fetch_assoc();
                if ($user['password'] == md5($password . $user['salt'])) {
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['login'] = $user['login'];
                    if (isset($_POST['save'])){
                        $key = genSalt();
                        setcookie('login',$user['login'] + 24* 60 * 3600);
                        setcookie('key',$key,time() + 24* 60 * 3600);
                        $setSaltQuery = "UPDATE users SET cookie = '$key' WHERE login = '$login'";
                        $connect->query($setSaltQuery);
                    }
                    echo 'login successfully';
                } else {
                    echo 'incorrect password';
                }
            } else {
                echo 'incorrect login';
            }
        } else {
            echo 'query error: ' . $connect->error;
        }
    } else {
        echo 'auth form empty';
    }
}
?>
<?php
if (empty($_SESSION['auth'])) {
    ?>
    <span>Авторизация</span>
    <form action="" method="post">
        <?php if (empty($_SESSION['auth']) && isset($_POST['auth'])) { ?>
            <span style="color: red;">Error! incorrect input</span>
            <input style="border: 2px solid red" type="text" name="auth_login" placeholder="login"
                   value="<?php echo $_POST['auth_login'] ?>">
            <input style="border: 2px solid red" type="password" name="auth_password" placeholder="password"
                   value="<?php echo $_POST['auth_password'] ?>">
            <span>Запомнить меня</span>
            <input type="checkbox" name="save" checked>
        <?php } else { ?>
            <input type="text" name="auth_login" placeholder="login">
            <input type="password" name="auth_pasword" placeholder="password">
            <span>Запомнить меня</span>
            <input type="checkbox" name="save">
        <?php } ?>
        <input type="submit" name="auth" value="Auth">
    </form>
    <?php
}
?>

