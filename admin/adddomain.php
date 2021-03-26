<?php
$domain = $_POST["domain"] ;
// $domain = "asda@ada.com";
require "../dbcon.php";
$sql = "INSERT INTO `domain_data` (`domain_id`, `domains`) VALUES (NULL, '".$domain."')";
if ($mysqli->query($sql) === TRUE) {
    echo TRUE;
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
