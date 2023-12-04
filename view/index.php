<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
include_once '../control/send.php';
include_once '../model/credentials.php';
require_once '../fpdf186/fpdf.php';
include_once '../control/facturec.php';
include_once '../model/facture.php';


$email=$_GET['mail'];
//echo ($email);
$name=$_GET['name'];
//echo ($name);
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Host = "smtp.gmail.com";
    $mail->Username   = 'riahi.omar@esprit.tn';                     //SMTP username
    $mail->Password   = '221JMT29499';   
    $mail->Port = 465; //Set the encryption system to use - ssl (deprecated) or tls
    //Server settings                    

    //Recipients
    $mail->setFrom('riahi.omar@esprit.tn', 'omar');
    $mail->addAddress( $email,'user');     //Add a recipient

    //Attachments
    $mail->addAttachment('slm.jpg');         //Add attachments

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'MENTAL HARBOUR';
    $mail->Body    = "This is a automated payment confirmation mail for mr or ms <b> $name </b> if this is not you rip also no refunds";
    $mail->AltBody = 'bye';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}