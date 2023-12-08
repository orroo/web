<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
               
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'riahi.omar@esprit.tn';                     //SMTP username
    $mail->Password   = '221JMT29499';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('riahi.omar@esprit.tn', 'omar');
    $mail->addAddress('mouellhi.amall@gmail.com', 'AM');     //Add a recipient
    

    //Attachments
    $mail->addAttachment(path:'C:\xampp\htdocs\TEST\view/poster.png', name:"Mental-harbour-launch.png");    //Optional name

    //Content
    $mail->isHTML(true);                                 
    $mail->Subject = 'Mental Harbour Official Launch !';
    $mail->Body    = 'Save the date ! Mental Harbour is opening soon <b></b>';


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}