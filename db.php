<?php
$server = 'localhost';
$username = 'jrlvarghese';
$password = 'j12r18l10';
$dbName = 'messagedb';
// connect to MySQL
$connection = mysqli_connect($server, $username, $password, $dbName);
// test connection
if(mysqli_connect_errno()){
    echo 'Connection error: '.mysqli_connect_error;
}