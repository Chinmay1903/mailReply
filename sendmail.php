<?php

require "dbcon.php";

$Name = $_POST["name"] ;
$ToAddress = $_POST["mail"];
$domain = $_POST["domain"];
$templatename = $_POST["template"];
// $SignatureForDomain = "Please reply and let me know if this helped - BestVAMortgageRates.com Support";

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

    switch ($domain) {

        case "insider@theemortgage.com":
        $AddressSpecificToEmailAccount = "3556 S 5600 W # 1 - 1139 Salt Lake City 84120, Utah";
        break;
        
        case "guide@incentiveshow.com":
        $AddressSpecificToEmailAccount = "34 N Franklin Ave, Suite #687 1402 Pinedale, 89241, Wyoming";
        break;
        
        case "insider@cshowcase.com":
        $AddressSpecificToEmailAccount = "100- 24th Street W. # 1- 2002 Billings 11205 Montana";
        break;
        
        case "outlooks@occucom.com":
        $AddressSpecificToEmailAccount = "9 N River Road #402 - Auburn 04210 Maine";
        break;
        
        case "yourguide@webwad.com":
        $AddressSpecificToEmailAccount = "27708 Tomball Parkway 1003 Tomball, 77375, Texas";
        break;
        
        case "salute@bestvamortgagerates.com":
        $AddressSpecificToEmailAccount = "526 North St Cloud St. Suite #506 Allentown PA  18104";
        break;
        
        
        case "experts@bestworldfinancial.com":
        $AddressSpecificToEmailAccount = "100- 24th Street W. # 1- 2002 Billings 11205 Montana";
        break;
        
        case "advisors@cruisincompany.com":
        $AddressSpecificToEmailAccount = "100- 24th Street W. # 1- 2002 Billings 11205 Montana";
        break;
        
        case "insider@myownauto.com":
        $AddressSpecificToEmailAccount = "2501 NE 23 Road, Suite # A 138 Oklahoma 73111 Oklahoma";
        break;
        
        case "yourguide@homeservicesnet.com":
        $AddressSpecificToEmailAccount = "9 N River Road #402 - Auburn 04210 Maine";
        break;
        
        case "info@contralabel.com":
        $AddressSpecificToEmailAccount = "115 E​lm Street | Suite I 3​08 | Farmi​ngton, MN | 55​024";
        break;
        
        case "hellohello@forwardpositive.com":
        $AddressSpecificToEmailAccount = "5307 Victoria Drive #395 Vancouver, BC V5P 3V6";
        break;
        
        case "heretohelp@nothnaglemortgage.com":
        $AddressSpecificToEmailAccount = "34 N Franklin Ave, Suite #687 1402 Pinedale, 89241, Wyoming";
        break;
        
        case "citizen@survivalsystemsint.com":
        $AddressSpecificToEmailAccount = "115 Elm Suite # I-308 Farmington 55024 Minnesota";
        break;
        
        case "hereforyou@newlifeseries.com":
        $AddressSpecificToEmailAccount = "34 N Franklin Ave, Suite #687 1402 Pinedale, 89241, Wyoming";
        }

$result = $mysqli->query("SELECT template_body_text FROM mail_data WHERE template_name= '".$templatename."'"); //query
$row = $result -> fetch_assoc();
// echo $row["template_body_text"];
$body=str_replace("[[Name]]",$Name,$row["template_body_text"]);
$body=str_replace("[[ToAddress]]",$ToAddress,$body);
$body=str_replace("[[SignatureForDomain]]",$SignatureForDomain,$body);
$body=str_replace("[[InsertAddressSpecificToEmailAccount]]",$AddressSpecificToEmailAccount,$body);
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