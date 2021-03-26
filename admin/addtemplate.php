<?php
$templatename = $_POST["templatename"] ;
$templatebody = $_POST["templatebody"] ;
// $templatename = "TEst";
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
require "../dbcon.php";
$sql = "INSERT INTO `mail_data` (`template_name`, `template_body_text`) VALUES ('". $templatename ."', '". $templatebody ."');";
if ($mysqli->query($sql) === TRUE) {
    echo TRUE;
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
