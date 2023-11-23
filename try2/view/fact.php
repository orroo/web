<?php
    include_once '../control/facturec.php';
    include_once '../model/facture.php';

    $error = "";

    $factc = new factureC();
    $fact = new facture(
        $_POST['id_facture'],
        $_POST['prix'],
        $_POST['email'],

    );
    $factc->addfact($fact);


    ?>