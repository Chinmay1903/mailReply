<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once "vendor/autoload.php";

$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "emailsupport@liveoakmediaventures.com";
$mail->Password = "Ig2676^aYoae";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 587;

$mail->From = "Test@test.com";
$mail->FromName = "Test Data";

$mail->addAddress("uic.17mca8173@gmail.com", "Dev");

$mail->isHTML(true);

$mail->Subject = "Re: Dev, You Could Cut Your Cost By Up To 40%";
$mail->Body = "Test";
// $mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    echo true;
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}