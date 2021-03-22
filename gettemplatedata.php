<?php
$host = "localhost";
$user = "root";
$pass = "";
$databaseName = "reply_mail";
$mysqli = new mysqli($host, $user, $pass, $databaseName);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
$result = $mysqli->query("SELECT * FROM mail_data"); //query
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
$mysqli->close();
