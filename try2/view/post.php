<?php
    include_once '../control/send.php';
    include_once '../model/credentials.php';

    $error = "";

    $credC = new credentialsC();
    $cred = new credentials(
        $_POST['name'],
        $_POST['mail'],
        $_POST['address'],
        $_POST['city'],
        $_POST['state'],
        $_POST['zip'],
        $_POST['noc'],
        $_POST['ccn'],
        $_POST['xp'],
        $_POST['cw'],
    );

    $credC->updatecred($cred,$_POST['name']);

    ?>