<?php
require "dbcon.php";
$mysqli = new mysqli($host, $user, $pass, $databaseName);
$result = $mysqli->query("SELECT * FROM domain_data"); //query
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
$mysqli->close();
