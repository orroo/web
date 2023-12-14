<?php
    include_once '../controller/facturec.php';
    include_once '../controller/planC.php';
    include_once '../controller/send.php';
    include_once '../model/facture.php';
    include_once '../model/plan.php';
    include_once '../model/credentials.php';
    require_once '../model/User.php';
    require_once '../connexion.php';
    include_once '../controller/nudes.php';

    $error = "";
    $planC=new planC();
    if ((isset($_POST['email']))&&(!empty(isset($_POST['email']))))
    {
        $email=$_POST['email'];
        $_SESSION['Email']=$email;
    }
    else
    {
        if ((!isset($_SESSION['Email']))||(empty($_SESSION['Email'])))
        {
            $_SESSION['back']="fact.php";
        ?>
            <meta http-equiv="refresh" content="0; url=facture.php"/>
        <?php
            
            exit;
        }
        $email=$_SESSION['Email'];
    }
    

    $credC=new credentialsC();
    $cred=$credC->showcred($email);
    if (( !isset($cred))||(empty($cred)))
    {
        $_SESSION['back']="fact.php";
        ?>
            <meta http-equiv="refresh" content="0; url=index.php"/>
        <?php
            
            exit;
    }

    $plan=$planC->showplan( $_SESSION['idplan'] );

    $factc = new factureC();
    $fact = new facture(
        null,
        $plan['prix'],
        $email,

    );
    $factc->addfact($fact);
    $idfact =  $factc->MI();

    $url = 'pdf.php';

    $parameters = [
    'email' =>  $email,
    'prix' =>  $plan['prix'],
    'id_facture'=> $idfact
    ];

    $url .= '?'.http_build_query($parameters);

    ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="site.css">
    <title>Document</title>
    
</head>
<body>
    <header>
    <nav>
            <a href="main_page.php"><img src="a.png" class="logo" height="60%" width="60%" alt="Image 1"></a>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
</ul>
            <?php
            if (( isset( $_SESSION['Username']))&&(!empty($_SESSION['Username'])))
            {
            ?>
             <img class='user' src=<?php echo 'data:image/png;base64,'.base64_encode($_SESSION['img']);?> onclick=toggleMenu()>
            
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src=<?php echo 'data:image/png;base64,'.base64_encode($_SESSION['img']);?>>
                        <h2 name="name"><?php echo $_SESSION["Username"]?></h2>
                    </div>
                    <hr>

                    <a href="profile.php" class="sub-menu-link">
                        <img src="images/profile.png">
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>

                    <a href="indexU.php" class="sub-menu-link">
                        <img src="images/setting.png">
                        <p>Settings & Privacy</p>
                        <span>></span>
                    </a>

                    <a href="#" class="sub-menu-link">
                        <img src="images/help.png">
                        <p>Help & Support</p>
                        <span>></span>
                    </a>

                    <a href="logout.php" class="sub-menu-link">
                        <img src="images/logout.png">
                        <p>Logout</p>
                        <span>></span>
                    </a>

                    
                    <?php if ((isset($_SESSION['admin']))&&($_SESSION['admin']==1)){
                             echo '<a href="admin.html" class="sub-menu-link">
                             <img src="images/profile.png">
                             <p>Dashboard</p>
                             <span>></span>
                            </a>';
                        } ?>

                </div>
            </div>
            <?php
            }
            else 
            {
            ?>
                <a href="login.php"class="btn">Get started</a>
            <?php
            }
            ?>
        </nav>
    </header>
    <div class="hi">
        <form>

    
        <div class="row">

            <div class="col">
                <h3 class="titre">billing address</h3>

                <div class="inputbox" >
                    <span>full name :</span>
                    <p><?php echo $cred['full_name'];?></p>

                </div>
                <div class="inputbox">
                    <span>email :</span>
                    <p><?php echo $cred['email'];?></p>
                    <span class="hh" id="emailError"></span>
                </div>
                <div class="inputbox">
                    <span>address :</span>
                    <p><?php echo $cred['address'];?></p>
                    <span class="hh" id="addressError"></span>
                </div>
                <div class="inputbox">
                    <span>city :</span>
                    <p><?php echo $cred['city'];?></p>
                    <span class="hh" id="cityError"></span>
                </div>
                <div class="flex">
                    <div class="inputbox">
                        <span>state :</span>
                        <p><?php echo $cred['state'];?></p>
                        <span class="hh" id="stateError"></span>
                    </div>
                    <div class="inputbox">
                        <span>zip code :</span>
                        <p><?php echo $cred['zip_code'];?></p>
                        <span class="hh" id="zipError"></span>
                    </div>
                </div>
            </div>


            <div class="col">
                <h3 class="titre">payment</h3>

                <div class="inputbox">
                    <span>cards accepted :</span>
                    <img src="card_img.png" alt="">
                </div>
                <div class="inputbox">
                    <span>name on card :</span>
                    <p><?php echo $cred['name_on_card'];?></p>
                    <span class="hh" id="namecError"></span>
                </div>
                
                <div class="inputbox">
                    <span>credit card number :</span>
                    <p><?php echo $cred['credit_card_number'];?></p>
                    <span class="hh" id="cardError"></span>
                </div>
                <div class="inputbox">
                    <span>exp date :</span>
                    <p><?php echo $cred['exp_date'];?></p>
                    <span class="hh" id="expError"></span>
                </div>
                <div class="flex">
                    <div class="inputbox">
                        <span>CW :</span>
                        <p><?php echo $cred['cw'];?></pspan>
                        <span class="hh" id="cwError"></span>
                    </div>
                </div>
            </div>
                
   

        </div>


    
        
</form>
    <a href='<?php echo $url; ?>' target='_blank'><button>make a pdf out of this</button></a>
    </div>
    <script>
        let subMenu=document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
    
</body>




    