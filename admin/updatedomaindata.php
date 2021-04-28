<?php
$domain = $_POST["domain"] ;
$changeddomain = $_POST["changeddomain"] ;

// $domain = "test@test.com" ;
// $changeddomain = "test@test.co" ;

require "../dbcon.php";
$sql = "UPDATE `domain_data` SET `domains`= '".$changeddomain."' WHERE `domains`= '".$domain."'";
if ($mysqli->query($sql) === TRUE) {
    echo TRUE;
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }