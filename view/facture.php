<?php
require_once '../model/User.php';
require_once '../connexion.php';
include_once '../controller/nudes.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="site.css">
    <title>Document</title>
    <!--<script src="../controller/test.js"></script>-->
</head>
<body>
    <header>
    <nav>
            <a href="main_page.php"><img src="a.png" class="logou" height="60%" width="60%" alt="Image 1"></a>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
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
        </nav>
    </header>
    <div class="hi">

        <form action="fact.php" method="post">
            <div class="row">
    
                <div class="col">
                    <h3 class="titre">facture</h3>
    
                    
                    <div class="inputbox">
                        <span>email :</span>
                        <input type="text" placeholder="mail" name="email">
                    </div>
            </div>
    
            <input type="submit" value="print" class="submit-btn"  id="butt">
    
    
        </form>
    
    </div>
    <script>
        let subMenu=document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
    
</body>
</html>