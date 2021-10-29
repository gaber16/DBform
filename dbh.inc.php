<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "registration";


$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if (!$conn){
    die("connection failed: ");
}
else {
    echo "connected successfully\n";
}
