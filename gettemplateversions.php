<?php
require "dbcon.php";
$templatename = $_POST["templatename"] ;
// $templatename =  "interest_template";
$mysqli = new mysqli($host, $user, $pass, $databaseName);
$result = $mysqli->query("SELECT template_version FROM `mail_data` WHERE `template_name` ='".$templatename."'"); //query
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
$mysqli->close();
