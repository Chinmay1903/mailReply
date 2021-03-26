<?php
$host = "localhost";
$user = "Developer";
$pass = "19031996";
$databaseName = "reply_mail";
$mysqli = new mysqli($host, $user, $pass, $databaseName);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
?>