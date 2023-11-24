<?php
    include_once '../control/send.php';
    include_once '../model/test.php';

    $error = "";

    $credC = new testC();
    $cred = new test(
        $_POST['id'],
        $_POST['taille'],
        $_POST['type'],
        
    );

    $testC->updatetest($test,$_POST['test']);

    ?>
    