<?php require_once('auth.php') ?>
<?php require_once('vendor/autoload.php') ?>
<?php
$clientID = "867755230110-0h3aa5a7i6j2rvid7a6tutp3evsbep24.apps.googleusercontent.com";
$secret = "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";

// Google API Client
$gclient = new Google\Client();

$gclient->setClientId($clientID);
$gclient->setClientSecret($secret);
$gclient->setRedirectUri('http://localhost/shit/view/testlogin/login.php');


$gclient->addScope('email');
$gclient->addScope('profile');
?>
<!DOCTYPE html>
<body>
    </nav>
    <div class="container my-5">
        <div class="row">
            <div class="col-auto mx-auto">
            <meta
            http-equiv="refresh"
            content="0;
            url=<?= $gclient->createAuthUrl() ?>"/>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_GET['code'])){
    // Get Token
    $token = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);

    // Check if fetching token did not return any errors
    if(!isset($token['error'])){
        // Setting Access token
        $gclient->setAccessToken($token['access_token']);

        // store access token
        $_SESSION['access_token'] = $token['access_token'];

        // Get Account Profile using Google Service
        $gservice = new Google\Service\Oauth2($gclient);

        // Get User Data
        $udata = $gservice->userinfo->get();
        foreach($udata as $k => $v){
            $_SESSION['login_'.$k] = $v;
        }
        $_SESSION['ucode'] = $_GET['code'];

        header('location:http://localhost/shit/view/testlogin/index.php');
        exit;

    }
}

?>

