<?php
$templatename = $_POST["templatename"] ;
$templatebody = $_POST["templatebody"] ;
$templateversion = $_POST["templateversion"];
// $templatename = " interest_template";
// $templatebody = "
//   <body>
//     <p>
//       Hello [[Name]]<br />
//       <br />
//       Looks like we have some incorrect information on file.
//       <br />
//       <br />
//       Please reply with what you`d like updated, or visit the website and fill
//       out the form.
//       <br />
//       <br />
//       [[SignatureForDomain]]
//     </p>
//   </body>
// </html>";
// $templateversion = 4;
require "../dbcon.php";

  $res = $mysqli->query("SELECT * FROM `templatename` WHERE `template_name`='".trim($templatename)."'");
  $result = mysqli_fetch_array($res);
  if ($result) {
    // echo $result;
    $sql = "INSERT INTO `mail_data` (`template_name`, `template_body_text`, `template_version` ) VALUES ('". trim($templatename) ."', '". $templatebody ."', ".$templateversion.");";
    if ($mysqli->query($sql) === TRUE) {
      echo TRUE;
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
  } else {
    // echo "failed ";
    $sql = "INSERT INTO `mail_data` (`template_name`, `template_body_text`, `template_version` ) VALUES ('". trim($templatename) ."', '". $templatebody ."', ".$templateversion.");";
    $sql2 = "INSERT INTO `templatename` (`template_name`) VALUES ('". trim($templatename) ."');";
    if ($mysqli->query($sql) === TRUE && $mysqli->query($sql2) === TRUE) {
      echo TRUE;
    } else {
      echo "Error1: " . $sql . "<br>Error2:" . $sql2 . "<br>" . $mysqli->error;
    }
  }

$mysqli->close();