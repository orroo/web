<?php
include_once '../controller/serviceC.php';
include_once '../model/service.php';
require_once '../connexion.php';
$serviceC=new serviceC();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web-site i dont fkn know tbh</title>
    <link rel="stylesheet" href="site.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</head>
<body>
    <div class="heroh">
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

        <div class="content">
            <center><h1>We want you to get the care<br> you deserve.</h1></center>
            
        </div>

    </div>
    <section class="mero">
        <div class="row">
            <div class="c">
                <div class="co">
                <h1>Transforming mental<br>healthcare</h1>
                <p>We are a group of doctoral-level psychologists and psychiatrists who provide quality mental health care. As a mental health collective, we assist members by providing therapy, medication management, coaching, and more. We help our clients connect with one of our doctors who can meet their needs and is available online or in-person.</p>
                </div>
                <div class="c"> 
                    <img src="https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102938127-AEFUOLOCS5NCKUHZTF90/image-asset.jpeg" width="90%" height="65%">
                </div>
            </div>
    </section>
    <section class="lero">
        <div class="row">
            <div class="c">
                <div class="co">
                <h1>A modern approach into<br>mental health</h1>
                <p>Its kind of essential for us that our clients really get personalized suggestions on who from our team mostly is the literally the best basically match. Rather than do things the typical way, weve created a system designed around our patients needs.</p>
                </div>
                <div class="c"> 
                    <img src="images/g.jpeg" width="90%" height="65%">
                </div>
            </div>
    </section>

    <div class="kero">
        <h1>Our rates</h1>
    </div>

    <section class="mm">
        <div class="row">
            <div class="c">
            <center><h2>Talk therapy</h2></center>
            <p>Online or in-person, this is designated for individuals to process and explore their thoughts. Typically, meetings are weekly or bi-weekly. <br><br> 60 minutes |  <?php $service=$serviceC->showservice(3); echo $service['prix'];?> DNT  |  <a href="#">Get started</a></p>
            </div>
            <div class="c">
            <center><h2>Psychiatric session</h2></center>
            <p>Online or in-person, this time will be spent evaluating your physical and mental health to provide medication to alleviate mental health symptoms. This does not include talk therapy.<br><br> 60 minutes |  <?php $service=$serviceC->showservice(4); echo $service['prix'];?> DNT  |  <a href="#">Get started</a></p>
            </div>
            <div class="c">
            <center><h2>Take test</h2></center>
            <p>Take this online test to check your mood today and see what other services can help you change that. <br><br> 5 minutes |  Free  |  <a href="test.php">Take test</a></p>
            </div>
            <div class="c">
            <center><h2>Meditation access</h2></center>
            <p>In-person only, this session helps you get access to meditation exercises and help you be in touch physically and spiritually .<br><br> 1 month |  <?php $service=$serviceC->showservice(2); echo $service['prix'];?> DNT  |  <a href="#">Get started</a></p>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
    </section>
    <section class="ll">
        <center><h1>Get started with Mental Harbour, today.</h1></center>
    </section>
    <section class="qq">
        <center><div class="row">
            <div class="c">
            <center><h2>Stay in touch.</h2></center>
            </div>
            <div class="c">
            <center><h2>Questions?</h2></center>
            <br>
            <a href="https://tambourine-avocado-8cnj.squarespace.com/contact">Contact us</a>
            <br><br>
            <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
            <a href="#"><ion-icon name="logo-youtube"></ion-icon></a>
            </div>
            <div class="k">
                <a href="https://tambourine-avocado-8cnj.squarespace.com/about/">About</a>
                <br><br>
                <a href="https://tambourine-avocado-8cnj.squarespace.com/services">Services</a>
                <br><br>
                <a href="https://tambourine-avocado-8cnj.squarespace.com/team">Team</a>
            </div>
            <div class="k">
                <a href="https://tambourine-avocado-8cnj.squarespace.com/our-approach">Our Approach</a>
                <br><br>
                <a href="https://tambourine-avocado-8cnj.squarespace.com/blog">Blog</a>
                <br><br>
                <a href="login.php">Get Started</a>
            </div>
        </div>
    </section>
    <script>
        let subMenu=document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>

</body>
<style>
    .qq .c a{
        font-family: ok;
        color: hsl(17.24deg 47.48% 64.3%);
        text-decoration: underline;
        padding-bottom: 47%;
    }
    .qq .k a{
        font-family: ok;
        color: hsl(17.24deg 47.48% 64.3%);
        text-decoration: underline;
    }
    .qq .c h2{
        max-width: 320px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        color: #3F4A49;
        font-size: 27px;
    }
    .qq .c ion-icon{
        font-family: ok;
        color: #4C5C5C;
        text-decoration: underline;
        margin-left: 10%;
        margin-right: 10%;
        scale: 1.5;
    }
    .qq .row{
        margin-top: -13%;
        margin-right: 19%;
        margin-left: 19%;
        display: flex;
        justify-content: space-between;
    }
    .qq{
        padding-top: 16%;
        background-color: white;
    }
    .ll{
        padding-top: 30%;
        background-color:#DCDCD4;
    }
    .ll h1{
        font-size:70px;
        color: #3F4A49;
        font-family: 'Times New Roman', Times, serif;
        margin-top: -18%;
        max-width: 1100px;
    }
    .mm .c a{
        color: hsl(17.24deg 47.48% 64.3%);
    }
    .mm .c h2{
        max-width: 500px;
        font-family: 'Times New Roman', Times, serif;
        color: #3F4A49;
        font-size: 40px;
    }
    .mm .c p{
        max-width: 500px;
        font-family: ok;
        color: #3F4A49;
        font-size: 16px;
    }
    .mm .c{
        margin-top: 5%;
        margin-right: 20%;
        margin-left: 20%;
        display: flex;
        justify-content: space-between;
    }
    .kero{
        margin-left: 40%;
        margin-top: -14%;
        margin-bottom: 8%;
        max-width: 700px;
    }
    .kero h1{
        font-size:60px;
        color: #3F4A49;
        font-family: 'Times New Roman', Times, serif;
    }
    .co{
        margin-top: 25%;
        margin-bottom:-30% ;
    }
    .c img{
        margin-left: 110%;
        margin-top: -50%;
        margin-bottom: 40%;
    }
    .btn{
        display: inline-block;
        text-decoration: none;
        padding: 14px 40px;
        margin-right:-200px;
        width:15rem;
        color: white;
        background: hsl(17.24deg 47.48% 64.3%);
        font-size: 14px;
        z-index: 1000;
    }
    .content{
        margin-top: 21%;
        max-width: 2000px;
    }
    .content h1{
        font-size:70px;
        color: white;
        font-family: 'Times New Roman', Times, serif;
    }
    .heroh{
        width: 100%;
        min-height: 100vh;
        background:linear-gradient(to bottom, rgba(20, 20, 20, 0.54), rgba(20, 20, 20, 0.492)),url(images/hihi.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        color: #525252;
    }
    .mero{
        margin-left: 15%;
        max-width: 2000px;
    }
    .lero{
        margin-left: 15%;
        max-width: 2000px;
    }
    .mero h1{
        font-size:60px;
        color: #3F4A49;
        font-family: 'Times New Roman', Times, serif;
    }
    .lero h1{
        font-size:60px;
        color: #3F4A49;
        font-family: 'Times New Roman', Times, serif;
    }
    .mero p{
        margin-top: 6%;
        font-size:23px;
        color: #3F4A49;
        font-family:ok;
        max-width: 1200px;
        line-height: 200%;
    }
    .mero .row{
        margin-top: 5%;
        display: flex;
        justify-content: space-between;
        max-width: 700px;
    }
    .lero p{
        margin-top: 6%;
        font-size:23px;
        color: #3F4A49;
        font-family:ok;
        max-width: 1200px;
        line-height: 200%;
    }
    .lero .row{
        margin-top: -8%;
        display: flex;
        justify-content: space-between;
        max-width: 700px;
    }
</style>