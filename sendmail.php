<?php

require "dbcon.php";

$Name = $_POST["name"] ;
$ToAddress = $_POST["mail"];
$domain = $_POST["domain"];
$templatename = $_POST["template"];
$SignatureForDomain = "Please reply and let me know if this helped - BestVAMortgageRates.com Support";

switch ($domain) {
    case "insider@theemortgage.com":
    $SignatureForDomain =  "Thank you! TheEMortgage.com Support";
    $domainname = "TheEMortgage.com";
    break;
    
    case "guide@incentiveshow.com":
    $SignatureForDomain =  "Thanks, and please respond with any other questions you may have - IncentiveShow.com Team";
    $domainname = "IncentiveShow.com";
    break;
    
    case "insider@cshowcase.com":
    $SignatureForDomain =  "Thanks - reply if you still need assistance! - CShowCase.com Support";
    $domainname = "CShowCase.com";
    break;
    
    case "outlooks@occucom.com":
    $SignatureForDomain =  "Hope this was helpful! Occucom Support";
    $domainname = "Occucom";
    break;
    
    case "yourguide@webwad.com":
    $SignatureForDomain =  "Thanks - WebWad.com Support";
    $domainname = "WebWad.com";
    break;
    
    case "salute@bestvamortgagerates.com":
    $SignatureForDomain =  "Please reply and let me know if this helped - BestVAMortgageRates.com Support";
    $domainname = "BestVAMortgageRates.com";
    break;
    
    case "experts@bestworldfinancial.com":
    $SignatureForDomain =  "Thank you for your inquiry - BestWorldFinancial.com Support Team";
    $domainname = "BestWorldFinancial.com";
    break;
    
    case "advisors@cruisincompany.com":
    $SignatureForDomain =  "Always glad to help! CruisinCompany.com Support";
    $domainname = "CruisinCompany.com";
    break;
    
    case "insider@myownauto.com":
    $SignatureForDomain =  "Thank you again! MyOwnAuto.com Support";
    $domainname = "MyOwnAuto.com";
    break;
    
    case "yourguide@homeservicesnet.com":
    $SignatureForDomain =  "Let me know if you have any more questions - HomeServicesNet.com Support";
    $domainname = "HomeServicesNet.com";
    break;
    
    case "info@contralabel.com":
    $SignatureForDomain =  "Thank you - please reply with any more queries! ContraLabel.com Support Team";
    $domainname = "ContraLabel.com";
    break;
    
    case "hellohello@forwardpositive.com":
    $SignatureForDomain =  "Thanks, have a great day! - The ForwardPositive.com Team";
    $domainname = "ForwardPositive.com";
    break;
    
    case "heretohelp@nothnaglemortgage.com":
    $SignatureForDomain =  "I hope this helped! Please reply and let me know. NothNagleMortgage.com Support Team";
    $domainname = "NothNagleMortgage.com";
    break;
    
    case "citizen@survivalsystemsint.com":
    $SignatureForDomain =  "Hopefully this was helpful - please let me know! SurvivalSystemsInt.com Support";
    $domainname = "SurvivalSystemsInt.com";
    break;
    
    case "hereforyou@newlifeseries.com":
    $SignatureForDomain =  "Thank you - Let us know if you need anything more! NewLifeSeries.com Support Team";
    $domainname = "NewLifeSeries.com";
    }

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
$result = $mysqli->query("SELECT template_body_text FROM mail_data WHERE template_name= '".$templatename."'"); //query
$row = $result -> fetch_assoc();
// echo $row["template_body_text"];
$body=str_replace("[[Name]]",$Name,$row["template_body_text"]);
$body=str_replace("[[ToAddress]]",$ToAddress,$body);
$body=str_replace("[[SignatureForDomain]]",$SignatureForDomain,$body);
$body=str_replace("[[InsertAddressSpecificToEmailAccount]]",$SignatureForDomain,$body);
// echo $body;
// die();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$mail = new PHPMailer(true);

//Enable SMTP debugging.
// $mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "uic.17mca8173@gmail.com";                 
$mail->Password = "19031996";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                                   

$mail->From = $domain;
$mail->FromName = $domainname;

$mail->addAddress($ToAddress, $Name);

$mail->isHTML(true);

$mail->Subject = "Re: ". $Name .", You Could Cut Your Cost By Up To 40%";
$mail->Body = $body;
// $mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    echo TRUE;
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}