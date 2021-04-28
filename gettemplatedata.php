<?php
// require "dbcon.php";
// $result = $mysqli->query("SELECT * FROM templatename"); //query
// while ($row = $result->fetch_assoc()) {
//     $rows[] = $row;
// }
// // print_r($result);
// echo json_encode($rows);
// $mysqli->close();


require "dbcon.php";
$sql = "SELECT * from mail_data";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $template_id = $row['template_id'];
        $template_name = $row['template_name'];
        $template_version = $row['template_version'];
        $template_body_text = utf8_encode($row['template_body_text']);
        $return_arr[] = array(
            "id" => $template_id,
            "template_name" => $template_name,
            "template_verson" => $template_version, 
            "template_body_text" => $template_body_text
        );
    }
} else {
    echo "0 results";
}
echo json_encode($return_arr,JSON_PRETTY_PRINT, 5); 
$mysqli->close();
