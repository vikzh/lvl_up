<?php
require 'config.php';
if (isset($_POST['registration'])) {
    if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        if ($_POST['password'] == $_POST['confirm_password']) {
            $login = strip_tags($_POST['login']);
            $password = strip_tags($_POST['password']);
            $verification_code = generateKey();
            $checkLogin = "SELECT * FROM users WHERE login = '$login'";
            $connection = dbConnection('localhost', 'root', 'root', 'mydb');
            if($result = $connection->query($checkLogin)){
                if ($result->num_rows == 0) {
                    $salt = generateKey();
                    $password = md5($salt.$password);
                    $regUserQuery = "INSERT INTO users SET login = '$login', password = '$password', verification_code = '$verification_code', mykey = '$salt'";
                    if ($connection->query($regUserQuery)){
                        echo 'registration complete';
                    }
            } else {
                    echo 'Login has taken ';
                }
            }
        } else {
            echo 'passwords incorrect ';
        }
    } else {
        echo 'empty input';
    }
}
?>

<form action="" method="post">
    <input type="text" name="login" placeholder="login">
    <input type="password" name="password" placeholder="password">
    <input type="password" name="confirm_password" placeholder="confirm password">
    <input type="submit" name="registration" value="Register">
</form>
