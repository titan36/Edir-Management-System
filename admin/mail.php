<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";

function sendmail($receiver, $Mail_protocol,$Mail_host, $Mail_port,$Mail_username,$Mail_password,$Mail_from,$Mail_title,$Mail_replyto,$name, $body){
$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;      
$mail->isSMTP();      
$mail->SMTPSecure = $Mail_encryption;                
$mail->Host = $Mail_host;
$mail->SMTPAuth = true;       
$mail->Username = $Mail_username;                 
$mail->Password = $Mail_password;                           
$mail->Port = $Mail_port;                                   
$mail->From = $Mail_from;
$mail->FromName = $name;
$mail->addAddress($receiver);
$mail->isHTML(true);
$mail->Subject = "ArifKen confirmation code";
$mail->Body = $body;
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
}




?>