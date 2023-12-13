<?php

require_once '../Controller/nudes.php';
require_once '../model/User.php';

$error = "";
$register = null;
$registerC = new registerC();

if (
    isset($_POST["Email"])
) {
    if (
        !empty($_POST["Email"])
    ) {
        try {
            foreach ($_POST as $key => $value) {
                // Sanitize user input if necessary
                echo "Key: $key, Value: " . htmlspecialchars($value) . "<br>";
            }

            $register = new register(
                $_POST['Username'],
                $_POST['Email'],
                $_POST['Password'],
                $imageData,
                $_POST['bio'],
                $_POST['country'],
                $_POST['phone']
            );
            echo $_POST['Email'];
            
            // Update user in the database
            $registerC->UpdateEmail($_POST['Email'],$_SESSION["Username"]);
            $registerC->Updatebio($_POST['bio'],$_SESSION["Username"]);
            $registerC->Updatecountry($_POST['country'],$_SESSION["Username"]);
            $registerC->Updatephone($_POST['phone'],$_SESSION["Username"]);
            $_SESSION["Email"]=$_POST['Email'];
            $_SESSION["bio"]=$_POST['bio'];
            $_SESSION["country"]=$_POST['country'];
            $_SESSION["phone"]=$_POST['phone'];

            header('Location:profile.php');

            exit();
        } catch (Exception $e) {
            // Handle exceptions, log errors, or display user-friendly error messages
            $error = $e->getMessage();
        }
    } else {
        $error = "Missing information";
    }
}
?>
