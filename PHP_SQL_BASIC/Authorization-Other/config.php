<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$db_name = 'mydb';

function dbConnection($host, $user, $password, $db_name)
{
    $connection = new mysqli($host, $user, $password, $db_name);
    if ($connection->connect_error) {
        die('Error db connection: ' . $connection->connect_error);
    }
    return $connection;
}

function generateKey(){
    $key = '';
    for ($i = 0;$i < 8; $i++){
        $key .= chr(rand(21,122));
    }
    return $key;
}