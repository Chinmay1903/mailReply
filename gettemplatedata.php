<?php
require "dbcon.php";
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
$result = $mysqli->query("SELECT template_name FROM mail_data"); //query
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
$mysqli->close();
