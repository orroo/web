<?php
    include_once '../controller/nudes.php';
    include_once '../model/User.php';
    
   
    $Email=$_POST['mail'];
    $Password=$_POST['ps'];
    $error ="";

    $userC = new loginC();

    $user=$userC->login($_POST['mail'],$_POST['ps']);
    if ((isset($user)&&(!empty($user)))&&(isset($_POST['g-recaptcha-response'])))
    {
        $secretkey="6LceISYpAAAAAFWBWviceWtAhT_HNDPNswhVmu2v";
        $ip=$_SERVER['REMOTE_ADDR'];
        $response=$_POST['g-recaptcha-response'];
        $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$ip";
        $fire=file_get_contents($url);
        $data=json_decode($fire);
        $_SESSION['valide']=true; 
        $_SESSION['Email']=$Email;
        $_SESSION['Username']=$user["Username"];
        $_SESSION["img"]=$user["img"];
        $_SESSION["bio"]=$user["bio"];
        $_SESSION["country"]=$user["country"];
        $_SESSION["phone"]=$user["phone"];
        
        
        if($data->success==true){
            if($Email=="souhaib.touaiti@esprit.tn" && $Password=="Admin123456")
            {
            $_SESSION['admin']=1;
            if (( isset($_SESSION['back']))&&(!empty($_SESSION['back'])))
            {
                header('location:'.$_SESSION['back']);
                exit;
            }
            echo '<meta
            http-equiv="refresh"
            content="0;
            url=admin.html"
            />';
            }
    else{
        $_SESSION['admin']=0;
        $_SESSION['Username']=$user["Username"];
        $_SESSION["img"]=$user["img"];
        $_SESSION["bio"]=$user["bio"];
        $_SESSION["country"]=$user["country"];
        $_SESSION["phone"]=$user["phone"];
        $_SESSION['admin']=1;
            if (( isset($_SESSION['back']))&&(!empty($_SESSION['back'])))
            {
                header('location:'.$_SESSION['back']);
                exit;
            }
        echo '<meta
            http-equiv="refresh"
            content="0;
            url=main_page.php"
            />';
    }
        }
        else{
            echo '<body>
            <img src="fuckk.png" width="100%" height="100%" alt="Image 1">
            <div class="fuck">
                <svg viewBox="25 25 50 50">
                    <circle r="20" cy="50" cx="50"></circle>
                </svg>
            </div>
            <meta
            http-equiv="refresh"
            content="3;
            url=login.php"
            </body>
        />';
        }
    }
    else
    {
        echo '<body>
        <img src="fuck.png" width="100%" height="100%" alt="Image 1">
        <div class="fuck">
            <svg viewBox="25 25 50 50">
                <circle r="20" cy="50" cx="50"></circle>
            </svg>
        </div>
        <meta
        http-equiv="refresh"
        content="3;
        url=login.php"
        </body>
    />';
    }

    ?>
    <style>
    @font-face {
        font-family:ok;
        src: url(Poppins-Regular.ttf);
    }
    .fuck{
        padding: 0px;
        margin: 0px;
        align-items: center;
        justify-content: center;
    }
    .fuck svg {
        position: relative;
        margin-left: 880px;
        margin-bottom: -900px;
        margin-top: -440px;
        width: 9em;
        transform-origin: center;
        animation: rotate4 2s linear infinite;
        }

        circle {
        fill: none;
        stroke: black;
        stroke-width: 3;
        stroke-dasharray: 1, 200;
        stroke-dashoffset: 0;
        stroke-linecap: round;
        animation: dash4 1.5s ease-in-out infinite;
        }

        @keyframes rotate4 {
        100% {
        transform: rotate(360deg);
        }
        }

        @keyframes dash4 {
        0% {
        stroke-dasharray: 1, 200;
        stroke-dashoffset: 0;
        }

        50% {
        stroke-dasharray: 90, 200;
        stroke-dashoffset: -35px;
        }

        100% {
        stroke-dashoffset: -125px;
        }
}

</style>