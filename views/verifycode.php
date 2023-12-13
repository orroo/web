<?php 
require_once '../Controller/nudes.php';
require_once '../model/User.php';

$code=$_SESSION['code'];

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
        <h1>Thank you for your time . You will recieve a code right away !</h1>
        <form action="http://localhost/shit/view/verifycode.php" method="POST">
            <label for="code" style="font-weight: 700;">Type the code below:</label>
            <input type="number" name="code" id="code" required>
            <input type="submit" value="Submit Code">
        </form>
        <p class="back" style="font-weight: 700;" >Go back to the <a href="mail.html">previous page</a>.</p>
        
    </div>
</body>
</html>



';

if (isset($_POST["code"])&&(!empty($_POST["code"])))
{
    $codek=($_POST["code"]);
    if($codek==$code)
    {
        echo '<meta
        http-equiv="refresh"
        content="0;
        url=http://localhost/shit/view/resetpass.php"
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
            <h1>Wrong code Try Again !</h1>
            <p class="back">Go back to the <a href="mail.html">homepage</a>.</p>
            
        </div>
        </body>
        </html>



        ';
    }

}



?>

