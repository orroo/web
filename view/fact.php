<?php
    include_once '../controller/facturec.php';
    include_once '../controller/planC.php';
    include_once '../controller/send.php';
    include_once '../model/facture.php';
    include_once '../model/plan.php';
    include_once '../model/credentials.php';

    $error = "";
    $planC=new planC();
    if ((isset($_POST['email']))&&(!empty(isset($_POST['email']))))
    {
        $email=$_POST['email'];
    }
    else
    {
        if ((!isset($_SESSION['email']))||(empty($_SESSION['email'])))
        {
            $_SESSION['back']="fact.php";
        ?>
            <meta http-equiv="refresh" content="0; url=http://localhost/P%20-%20Copy/view/facture.html"/>
        <?php
            
            exit;
        }
        $email=$_SESSION['email'];
    }

    $credC=new credentialsC();
    $cred=$credC->showcred($email);
    if (( !isset($cred))||(empty($cred)))
    {
        $_SESSION['back']="fact.php";
        ?>
            <meta http-equiv="refresh" content="0; url=http://localhost/P%20-%20Copy/view/index.html"/>
        <?php
            
            exit;
    }

    $plan=$planC->showplan( $_SESSION['idplan'] );
    var_dump($plan);

    $factc = new factureC();
    $fact = new facture(
        null,
        $plan['prix'],
        $_POST['email'],

    );
    $factc->addfact($fact);
    $idfact =  $factc->MI();

    $url = 'http://localhost/P%20-%20Copy/view/pdf.php';

    $parameters = [
    'email' =>  $email,
    'prix' =>  $plan['prix'],
    'id_facture'=> $idfact
    ];

    $url .= '?'.http_build_query($parameters);

    ?>

    <a href='<?php echo $url; ?>' target='_blank'><button>make a pdf out of this</button></a>

    