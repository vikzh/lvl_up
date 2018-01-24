<?php
session_start();
if (!empty($_SESSION['country'])){
    echo $_SESSION['country'];
}