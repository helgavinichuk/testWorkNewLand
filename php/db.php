<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'testForm';
$link = mysqli_connect($host, $user, $password, $db);
if (!$link){
    die('no connection: '.mysqli_error());
}