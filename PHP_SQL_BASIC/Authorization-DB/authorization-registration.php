<?php
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

if (isset($_POST['reg'])) {
    if (isset($_POST['reg_login']) && isset($_POST['reg_password']) && isset($_POST['password_confirm'])) {
        if (strlen($_POST['reg_login']) > 4 && strlen($_POST['reg_login']) < 12 && strlen($_POST['reg_password']) > 6 && strlen($_POST['reg_password']) < 11) {
            if ($_POST['reg_password'] == $_POST['password_confirm']) {
                $connect = dbConnection();
                $checkLoginQuery = "SELECT * FROM users WHERE login = '$_POST[reg_login]'";
                if ($checkLoginResult = $connect->query($checkLoginQuery)) {
                    if ($checkLoginResult->num_rows == 0) {
                        $login = $_POST['reg_login'];
                        $salt = genSalt();
                        $password = md5($_POST['reg_password'] . $salt);
                        $insertQuery = "INSERT INTO users set login ='$login',password ='$password',salt = '$salt'";
                        if ($connect->query($insertQuery) === TRUE) {
                            echo 'successfully reg';
                        } else {
                            echo 'Error: ' . $insertQuery . $connect->error;
                        }
                    } else {
                        echo "login is used";
                    }
                }
                $connect->close();
            } else {
                echo "password != confirm password";
            }
        } else {
            echo "length of login or password incorrect";
        }
    } else {
        echo "input empty";
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
    <span>Регситрация</span>
    <form action="" method="post">
        <input type="text" name="reg_login" placeholder="login">
        <input type="password" name="reg_password" placeholder="password">
        <input type="password" name="password_confirm" placeholder="confirm password">
        <input type="submit" name="reg" value="Reg">
    </form>
    <?php
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
        <?php } else { ?>
            <input type="text" name="auth_login" placeholder="login">
            <input type="password" name="auth_pasword" placeholder="password">
        <?php } ?>
        <input type="submit" name="auth" value="Auth">
    </form>
    <?php
}
?>
