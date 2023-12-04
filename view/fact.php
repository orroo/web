<?php
    include_once '../control/facturec.php';
    include_once '../model/facture.php';
    include_once '../model/credentials.php';

    $error = "";

    $factc = new factureC();
    $fact = new facture(
        $_POST['id_facture'],
        $_POST['prix'],
        $_POST['email'],

    );
    $factc->addfact($fact);

    $url = 'http://localhost/try2/view/pdf.php';

    $parameters = [
    'email' =>  $_POST['email'],
    'prix' => $_POST['prix'],
    'id_facture'=> $_POST['id_facture']
    ];

    $url .= '?'.http_build_query($parameters);

    ?>
    <meta http-equiv="refresh" content="0; url=<?php echo $url ?>" />