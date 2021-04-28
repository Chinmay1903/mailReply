<?php
$templatename = $_POST["templatename"] ;
$templateversion = $_POST["templateversion"];

// echo $templatename.$templateversion;

require "dbcon.php";
$sql = "SELECT `template_body_text` FROM `mail_data` WHERE `template_name` = '".$templatename."' AND `template_version` = '".$templateversion."'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $template_body_text = utf8_encode($row['template_body_text']);
        $return_arr[] = array(
            "template_body_text" => $template_body_text
        );
    }
} else {
    echo "0 results";
}
echo json_encode($return_arr,JSON_PRETTY_PRINT, 5); 
$mysqli->close();