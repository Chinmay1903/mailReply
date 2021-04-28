<?php
// ini_set("display_errors", 1);
// error_reporting(E_ALL);

$templatename = $_POST["templatename"];
$templateversion = $_POST["templateversion"];
// $templatename = "Unsub_template";
// $templateversion = 3;

require "../dbcon.php";
$sql2 = "SELECT `template_version` FROM `mail_data` WHERE `template_name`='" . $templatename . "'";
$result = $mysqli->query($sql2);
$rows = mysqli_num_rows($result);
// echo $rows;
if ($rows <= 1) {
  $sql = "DELETE FROM `templatename` WHERE `template_name`= '" . $templatename . "'";
  $mysqli->query($sql);
  // echo "1";
}
$sql = "DELETE FROM `mail_data` WHERE `template_name`='" . $templatename . "' AND `template_version`='". $templateversion ."'";
if ($mysqli->query($sql) === TRUE) {
  echo TRUE;
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();