<?php
require "dbcon.php";
$result = $mysqli->query("SELECT * FROM mail_data"); //query
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
$mysqli->close();
