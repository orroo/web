<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../Controller/nudes.php';
require_once '../model/User.php';
require_once '..\controller\PHPMailer-master\src\Exception.php';
require_once '..\controller\PHPMailer-master\src\PHPMailer.php';
require_once '..\controller\PHPMailer-master\src\SMTP.php';

$name = ($_POST["Username"]);
$email=($_POST["Email"]);
$mail = new PHPMailer(true);
$lc= new loginC;
$fk=$lc->mail($_POST['Email'],$_POST['Username']);
if (isset($fk)&&(!empty($fk))){
        $_SESSION['valide']=true; 
        $_SESSION['Email']=$email;
        $_SESSION['Username']=$name;
        $_SESSION['img']=$fk['img'];
        $_SESSION['Password']=$fk['Password'];
        $_SESSION['bio']=$fk['bio'];
        $_SESSION['country']=$fk['country'];
        $_SESSION['phone']=$fk['phone'];
        

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'riahi.omar@esprit.tn';
            $mail->Password   = '221JMT29499';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;    
        
            $code = rand(1000, 9999);
            $_SESSION['code']=$code;
            $htmlContent = '<html><body style="background-color: green ;"><center><h1>Your Verification code is : ' . $code . '</h1></center></body></html>';
            $htmlFileName = 'code.html';
            file_put_contents($htmlFileName, $htmlContent);
        
            $mail->From = "riahi.omar@esprit.tn";
            $mail->FromName = "Omar Riahi - Mental Harbour";
            $mail->addAddress($email,$name);
            $mail->addAttachment("..\controller\PHPMailer-master\\file.txt", "File.txt");
            $mail->addAttachment($htmlFileName);
            $mail->isHTML(true);
            $mail->Subject = "Subject Text";
            $mail->Body = "<i>Mail body in HTML</i>";
            $mail->AltBody = "This is the plain text version of the email content";
        
            $mail->send();
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            // echo "Mailer Exception: " . $e->getMessage(); // Uncomment this line for more details on the exception
        }
        
        unlink($htmlFileName);
        // Your HTML response goes here

        echo '<meta
        http-equiv="refresh"
        content="0;
        url=verifycode.php"
        />';
    }
    else{
        echo'

            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Contact form</title>
            <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="mail.css">
            </head>
            <body>
            <div class="container">
                <h1>Incorrect email or username Try Again !</h1>
                <p class="back">Go back to the <a href="mail.html">homepage</a>.</p>
                
            </div>
            </body>
            </html>



            ';
    }
    



?>
