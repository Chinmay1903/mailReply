<?php
$deletedomain = $_POST["domain"] ;

// $text="test@test.com ";

require "../dbcon.php";
$sql = "DELETE FROM `domain_data` WHERE `domains` = '". $deletedomain ."'";
if ($mysqli->query($sql) === TRUE) {
    echo TRUE;
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }