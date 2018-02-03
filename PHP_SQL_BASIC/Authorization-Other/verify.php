<?php
require 'config.php';
if(isset($_GET['login']) && isset($_GET['code'])){
    $connection = dbConnection($host,$user,$password,$db_name);
    $login = $_GET['login'];
    $code = $_GET['code'];
$confirmUser = "SELECT * FROM users WHERE login = '$login' AND verification_code = '$code'";
if($result = $connection->query($confirmUser)){
    if ($result->num_rows > 0){
        $user = $result->fetch_assoc();
        $updateVerification = "UPDATE users SET verification = 1 WHERE login = '$login' AND verification_code = '$code'";
        if($connection->query($updateVerification)){
            echo 'you have successfully activated your account ';
        } else {
            echo 'Error during verification user ';
        }
    } else {
        echo 'Wrong data ';
    }
} else {
    echo 'Error : ' . $connection->error;
}
}