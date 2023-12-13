<?php

require_once '../controller/nudes.php';
require_once '../model/User.php';
$error = "";

$register = null;

$registerC = new registerC();
if (
    isset($_FILES['img'])
    ) {
    if (
        !empty($_FILES["img"])
    ) {
        try {
            // Validation and Sanitization
            foreach ($_POST as $key => $value) {
                // Sanitize user input if necessary
                echo "Key: $key, Value: " . htmlspecialchars($value) . "<br>";
            }

            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Additional checks for file size, type, etc.

            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
            } else {
                throw new Exception("Sorry, there was an error uploading your file.");
            }

            // Read the image data
            $imageData = file_get_contents($target_file);

            // Create a User object with image data
            $register = new register(
                $_POST['Username'],
                $_POST['Email'],
                $_POST['Password'],
                $imageData,
                $_POST['bio'],
                $_POST['country'],
                $_POST['phone']
            );

            // Update user in the database
            $registerC->Updateimg($imageData,$_SESSION["Username"]);
            $_SESSION["img"]=$imageData;
            // Clean up: delete the temporary file
            unlink($target_file);
            header('Location:profile.php');



            exit();
        } catch (Exception $e) {
            // Handle exceptions, log errors, or display user-friendly error messages
            $error = $e->getMessage();
        }

    } else
        $error = "Missing information";
}
?>

