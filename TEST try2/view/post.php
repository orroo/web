<?php
    include_once '../control/sendtest.php';
    include_once '../model/addtest.php';

    $error = "";

    $testing = new testsC();
    $test = new test (
        $_POST['type'],
        $_POST['taille'],
        $_POST['idT'],
    );

    $testing->addtest($test);

    ?>