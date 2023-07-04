<?php
$databaseHost = 'localhost';
$databaseName = 'tesst';
$databaseUsername = 'root';
$databasePassword = '';


$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}