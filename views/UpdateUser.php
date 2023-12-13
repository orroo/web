<?php

require_once '../Controller/nudes.php';
require_once '../model/User.php';

$error = "";
$register = null;
$registerC = new registerC();

if (
    isset($_POST["Username"]) &&
    isset($_POST["Email"]) &&
    isset($_POST["Password"]) &&
    isset($_FILES['img']) &&
    isset($_POST["bio"]) &&
    isset($_POST["country"]) &&
    isset($_POST["phone"]) 
) {
    if (
        !empty($_POST['Username']) &&
        !empty($_POST["Email"]) &&
        !empty($_POST["Password"]) &&
        !empty($_FILES["img"])&&
        !empty($_POST["bio"]) &&
        !empty($_POST["country"]) &&
        !empty($_POST["phone"]) 
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
            $registerC->UpdateUser($register);
            echo 'done';

            // Clean up: delete the temporary file
            unlink($target_file);

            header('Location: ShowUser.php');
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="ShowUser.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['Username'])) {
        $register = $registerC->ShowUser();
        
    ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table>
            <tr>
                    <td><label for="Username">Username :</label></td>
                    <td>
                        <input type="text" id="Username" name="Username" value="<?php echo $_POST['Username'] ?>" readonly />
                        <span id="erreurname" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="Email">Email :</label></td>
                    <td>
                        <input type="email" id="Email" name="Email"/>
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="Password">Password :</label></td>
                    <td>
                        <input type="text" id="Password" name="Password"/>
                        <span id="erreurPassword" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="img">img :</label></td>
                    <td>
                        <input type="file" id="img" name="img"/>
                        <span id="erreurimg" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="bio">bio :</label></td>
                    <td>
                        <input type="text" id="bio" name="bio"/>
                        <span id="erreurimg" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="country">country :</label></td>
                    <td>
                        <input type="text" id="country" name="country"/>
                        <span id="erreurimg" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="phone">phone :</label></td>
                    <td>
                        <input type="text" id="phone" name="phone"/>
                        <span id="erreurimg" style="color: red"></span>
                    </td>
                </tr>
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>
