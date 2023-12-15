<?php
    include_once '../controller/sendtest.php';
    include_once '../model/addtest.php';
    require_once '../connexion.php';

    $error = "";

    $testing = new testsC();
    $test = new test (
        $_POST['type'],
        $_POST['taille'],
        $_POST['idT'],
    );

    $testing->addtest($test);

    ?>