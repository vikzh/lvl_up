<?php
require 'config.php';
session_start();

if (isset($_POST['send_auth'])){
    if(isset($_POST['login']) && isset($_POST['password'])){
            $login = $_POST['login'];
            $password = $_POST['password'];
            $selectUserQuery = "SELECT * FROM users WHERE login = '$login'";
            $connection = dbConnection('localhost', 'root', 'root', 'mydb');
            if ($result = $connection->query($selectUserQuery)){
                if ($result->num_rows > 0){
                    $user = $result->fetch_assoc();
                    if (md5($user['mykey'].$password) == $user['password']){
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['login'] = $user['login'];
                    echo 'all ok';
                    if (isset($_POST['remember'])){
                        $key = generateKey();
                        setcookie('login',$login, time() + 24 * 60 * 3600);
                        setcookie('key',$key, time() + 24 * 60 * 3600);
                    }
                    }  else {
                        echo 'pass incorrect' ;
                    }
                } else{
                    echo 'login or password incorrect ';
                }
            } else {
                echo 'Error in : ' . $connection->error;
            }
            $password = strip_tags($_POST['password']);
    }
}
?>

<form action="" method="post">
    <input type="text" name="login" placeholder="login">
    <input type="password" name="password" placeholder="password">
    <input type="submit" name="send_auth" value="Login">
    <span>remember me?</span><input type="checkbox" name="remember">
</form>
