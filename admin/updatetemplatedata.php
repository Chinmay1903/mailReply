<?php
$templatename = $_POST["templatename"] ;
$templateversion = $_POST["templateversion"];
$changedtemplatename = $_POST["changedtemplatename"] ;
$changedtemplatebody = $_POST["changedtemplatebody"] ;
$changedtempversion = $_POST["changedtempplateversion"];

// $templatename = "tt" ;
// $changedtemplatename = "tttt" ;
// $changedtemplatebody = "sadflkj" ;

require "../dbcon.php";
$sql = "UPDATE `mail_data` SET `template_name`= '".$changedtemplatename."',`template_body_text`= '".$changedtemplatebody."' ,`template_version`= ".$changedtempversion." WHERE `template_name`= '".$templatename."'AND `template_version` = ". $changedtempversion ;
if ($mysqli->query($sql) === TRUE) {
    echo TRUE;
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }