<?php
require 'config.php';
session_start();
if (isset($_POST['updatePassword'])){
    if (isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['new_password'])){
        if ($_POST['new_password'] == $_POST['confirm_password']){
            $connection = dbConnection($host,$user,$password,$db_name);
            //var_dump($connection);
            $checkPassword = "SELECT password,mykey FROM users WHERE id = '$_SESSION[id]'";
            if($result = $connection->query($checkPassword)){
                //var_dump($result);
                if ($result->num_rows > 0 ){
                  $user = $result->fetch_assoc();
                  //var_dump($user);
                  if(md5($user['mykey'].$_POST['password']) == $user['password']){
                      $newPassword = md5($user['mykey'].$_POST['new_password']);
                      $updatePassword = "UPDATE users SET password = '$newPassword' WHERE id = '$_SESSION[id]'";
                      if($connection->query($updatePassword)){
                          echo 'password changed ';
                      } else {
                          echo 'Error : ' . $connection->error;
                      }
                }
                }
            } else {
                echo 'Error: ' . $connection->error;
            }
        } else {
            echo 'password != confirm password ';
        }
    } else {
        echo 'password empty ';
    }
}

if (isset($_POST['del']) && $_SESSION['auth']){
    if (isset($_POST['password_to_del'])){
        $checkPassword = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
        $connection = dbConnection($host,$user,$password,$db_name);
        if($result = $connection->query($checkPassword)){
            if($result->num_rows > 0){
             $user = $result->fetch_assoc();
             if(md5($user['mykey'].$_POST['password_to_del']) == $user['password']){
                 $userDel = "DELETE FROM users WHERE id = '$_SESSION[id]'";
                 if($connection->query($userDel)){
                     echo 'user del ';
                 } else {
                     'Error : ' . $connection->error;
                 }

             } else {
                 echo 'Password incorrect ';
             }
            }
        } else {
            echo 'Error : ' . $connection->error;
        }
    }
}
if (isset($_GET['id']) && (isset($_SESSION['id']) && $_SESSION['id'] == $_GET['id'])) {
    if (empty($connection)){
    $connection = dbConnection($host, $user, $password, $db_name);
    }
    $getUserQuery = "SELECT id,login FROM users WHERE id = '$_GET[id]'";
    if ($result = $connection->query($getUserQuery)) {
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo "User id : $user[id]" . '<br>';
            echo "User login : $user[login]" . '<br>';
            ?>
            <form action="" method="post">
                <input type="password" name="password" placeholder="password">
                <input type="password" name="new_password" placeholder="new password">
                <input type="password" name="confirm_password" placeholder="confirm password">
                <input type="submit" name="updatePassword" value="Update Password">
            </form>

            <h2>Delete?</h2>
            <form action="" method="post">
                <input type="password" name="password_to_del">
                <input type="submit" name="del">
            </form>
            <?php
        } else {
            echo 'user with id not found ';
        }
    } else {
        echo 'Error : ' . $connection->error;
    }
} elseif (isset($_GET['id'])) {
    $connection = dbConnection($host, $user, $password, $db_name);
    $getUserQuery = "SELECT id,login FROM users WHERE id = '$_GET[id]'";
    if ($result = $connection->query($getUserQuery)) {
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo "User id : $user[id]" . '<br>';
            echo "User login : $user[login]" . '<br>';
        } else {
            echo 'user with id not found ';
        }
    } else {
        echo 'Error : ' . $connection->error;
    }
}
