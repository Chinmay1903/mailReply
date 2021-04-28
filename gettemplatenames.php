<?php
require "dbcon.php";
$result = $mysqli->query("SELECT * FROM templatename"); //query
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
// print_r($result);
echo json_encode($rows);
$mysqli->close();