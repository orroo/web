<?php
require_once '../model/User.php';
require_once '../connexion.php';
include_once '../controller/nudes.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styletest.css">
    <link rel="stylesheet" href="site.css">

    <title>TEST</title>
</head>
<body>

    <div class="banner">
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
    </div>    
    
    <div class="annonce">
        <h1>Even if it takes some trial and error to find the right connection</h1>
        <p>seeing a therapist is an impactful way to prioritize your mental health.</p>
        <div> 
            <button onclick="location.href='#services'">Connect with us</button>
            <?php
            if (isset($_SESSION['score'])&&(!empty($_SESSION['score'])))
            {
            ?>
                <a href="plan.php"><button>make a plan</button></a>
            <?php
            }
            ?>
        </div>
    </div>

        <div class="headline">
            <h1>Connecting with us</h1>
        </div>
        <div id="services"> 
            <div class="image-container">
                <img class='image' src="steps.png" alt="step">
            </div>

        </div>
        <div class="container">
            <a href="quiz2.php"><button class="btnn" >
              <svg width="277" height="62">
                <defs>
                  <linearGradient id="grad1">
                    <stop offset="0%" stop-color="#6C6061"/>
                    <stop offset="100%" stop-color="#64403E" />
                  </linearGradient>
                </defs>
                <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="266" height="50"></rect>
              </svg>
              <span>Take the test</span>
</button>
</a>
          </div>
    <script>
        let subMenu=document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>

       

            
              
</body>         
</html>
                 

