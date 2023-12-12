<?php
    include_once '../controller/sendtest.php';
    include_once '../model/addtest.php';
    require_once '../config.php';
    $error = "";
 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $type = isset($_POST['type']) ? $_POST['type'] : '';
    $taille = isset($_POST['taille']) ? $_POST['taille'] : '';
    $idT = isset($_POST['idT']) ? $_POST['idT'] : '';

    $testC = new testsC();
    $test = new test($type, $taille, $idT);
    

    $testC->updatetest($test,$type);
    }
    ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="testsdash.css">
    <title>Update Test</title>

</head>
<body>
    <form action="update.php" method="post">
        
        <label for="type">Type of Test? </label>
        <input type="text" name="type" required> 
        
        <label for="taille">Number of questions ?</label>
        <input type="text" name="taille" required> 
        
        <label for="idT"> Test number ? </label>
        <input type="text" name="idT" required> 

        <br>
        <input type="submit" value="Update Test">
       <a href="dashbord.html" class="go-back-btn">
        <button type="button">Go Back</button>
       </a> 
       <a href="listtests.php" class="view-tests-btn" id="viewTestsBtn">View List </a>

     
    </form>
    <script src="dash.js"></script> 

</body>
</html>