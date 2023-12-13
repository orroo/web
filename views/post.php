<?php
    include_once '../controller/nudes.php';
    include_once '../model/User.php';

    $error = "";


    $userC = new registerC();
    $user = new register(
        $_POST['name'],
        $_POST['email'],
        $_POST['pass'],
        file_get_contents("images/usr.png"),
        NULL,
        NULL,
        NULL
    );

    $bb=$userC->veriflogin($_POST['name']);

    if (isset($bb)&&(!empty($bb)))
    {
        echo '<body>
        <img src="fucck.png" width="100%" height="100%" alt="Image 1">
        <div class="fuck">
            <svg viewBox="25 25 50 50">
                <circle r="20" cy="50" cx="50"></circle>
            </svg>
        </div>
        <meta
        http-equiv="refresh"
        content="3;
        url=http://localhost/shit/view/register.html"
        </body>
    />';
    }
    else
    {
        $_SESSION['valide']=true; 
        $_SESSION['Username']=$user->getUsername();
        $_SESSION['img']=$user->getimg();
        $_SESSION['bio']=$user->getbio();
        $_SESSION['country']=$user->getcountry();
        $_SESSION['phone']=$user->getphone();
        $userC->addUser($user);
        echo '<meta
        http-equiv="refresh"
        content="0;
        url=http://localhost/shit/view/main_page.php"
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