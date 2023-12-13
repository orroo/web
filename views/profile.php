<?php 
require_once '../model/User.php';
require_once '..\config.php';
include_once '../controller/nudes.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web-site i dont fkn know tbh</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="uploadimg.css">
    <link rel="stylesheet" href="upload.css">
</head>
<body>
    <div class="hero">
        <nav>
            <a href="http://localhost/shit/view/main_page.php"><img src="a.png" class="logo" height="60%" width="60%" alt="Image 1"></a>
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

                        <a href="http://localhost/shit/view/profile.php" class="sub-menu-link">
                            <img src="images/profile.png">
                            <p>Edit Profile</p>
                            <span>></span>
                        </a>

                        <a href="http://localhost/shit/view/index.php" class="sub-menu-link">
                            <img src="images/setting.png">
                            <p>Settings & Privacy</p>
                            <span>></span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="images/help.png">
                            <p>Help & Support</p>
                            <span>></span>
                        </a>

                        <a href="http://localhost/shit/view/logout.php" class="sub-menu-link">
                            <img src="images/logout.png">
                            <p>Logout</p>
                            <span>></span>
                        </a>

                        <?php if ((isset($_SESSION['admin']))&&($_SESSION['admin']==1)){
                             echo '<a href="http://localhost/shit/view/admin.html" class="sub-menu-link">
                             <img src="images/profile.png">
                             <p>Dashboard</p>
                             <span>></span>
                            </a>';
                        } ?>
                    </div>
            </div>
        </nav>
        <div class="all">
            <div class="profile-header">
                <div class="profile-img">
                    <a href="#"><img src=<?php echo 'data:image/png;base64,'.base64_encode($_SESSION['img']);?> onclick=toggleMenu1() ></a>
                                <div class="sub-menu-wrap1" id="subMenu1">
                                <div class="sub-menu1">
                                    <button id="myBtn" class="sub-menu-link1">
                                        <div class="icon"><ion-icon name="download"></div></ion-icon>
                                        <p>Change Photo</p>
                                    </button>
                                    
                                </div>
                                <form method="post" action="updateimg.php" enctype="multipart/form-data">
                                <div id="myModal" class="modal">

                                
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <div class="container"> 
  <div class="header"> 
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> 
      <path d="M7 10V9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9V10C19.2091 10 21 11.7909 21 14C21 15.4806 20.1956 16.8084 19 17.5M7 10C4.79086 10 3 11.7909 3 14C3 15.4806 3.8044 16.8084 5 17.5M7 10C7.43285 10 7.84965 10.0688 8.24006 10.1959M12 12V21M12 12L15 15M12 12L9 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <p>Browse File to upload!</p>
  </div> 
  <label for="file" class="footer"> 
    <svg fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path><path d="M18.153 6h-.009v5.342H23.5v-.002z"></path></g></svg> 
    <p>Press Here To Upload The Photo</p> 
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z" stroke="#000000" stroke-width="2"></path> <path d="M19.5 5H4.5" stroke="#000000" stroke-width="2" stroke-linecap="round"></path> <path d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5H10V3Z" stroke="#000000" stroke-width="2"></path> </g></svg>
  </label> 
  <input id="file" type="file" name="img">
</div>


<center><button>
    <span class="circle1"></span>
    <span class="circle2"></span>
    <span class="circle3"></span>
    <span class="circle4"></span>
    <span class="circle5"></span>
    <span class="text">Upload Photo</span>
    <input type="submit" class="submit" value="">
</button></center>
</form>
                                </div>
                                
                                </div>
                        </div>
                </div>
                <div class="profile-nav-info">
                    <h3 name="user-name"><?php echo $_SESSION["Username"]?></h3>
                    <div class="address">
                        <p class="country"><?php echo $_SESSION["country"]?></p>
                    </div>
                </div>
                <div class="profile-option">
                    <div class="notification">
                        <ion-icon name="notifications"></ion-icon>
                            <span class="alert-message">
                                1
                            </span>
                    </div>
                </div>
            </div>
            <div class="main-bd">
                <div class="left-side">
                    <div class="profile-side">
                        <p class="mobile-no"><ion-icon name="call"></ion-icon>
                        <?php echo $_SESSION["phone"]?></p>
                        <p class="user-mail"><ion-icon name="mail"></ion-icon>
                            <?php echo $_SESSION["Email"]?></p>
                        <div class="user-bio">
                            <h3>Bio</h3>
                            <p class="bio" name="bio" id="bio"><ion-icon name="mail"></ion-icon>
                            <?php echo $_SESSION["bio"]?></p>
                        </div>
                    </div>
            </div>
            <div class="right-side">
                <div class="nav">
                    <ul>
                        <li onclick="showTab(0)" class="user-post active">Posts</li>
                        <li onclick="showTab(1)" class="user-review">Reviews</li>
                    </ul>
                </div>
                <div class="profile-body">
                    <div class="profile-posts tab">
                        <h1><center>Your posts</center></h1>
                        <p>Valorant,a mentally depressing game that when you start playing you dont want to quit cuz its so addictive.
                            Valorant is like drugs, you wanna quit but you cant cuz Riot games is probably a chinese org that tracks you with drones and when you sleep they probably put a chip in your brain to make you play more Valorant.</p>
                    </div>
                    <div class="profile-review tab">
                        <h1><center>User Reviews</center></h1>
                        <p>Valorant,a mentally depressing game that when you start playing you dont want to quit cuz its so addictive.
                            Valorant is like drugs, you wanna quit but you cant cuz Riot games is probably a chinese org that tracks you with drones and when you sleep they probably put a chip in your brain to make you play more Valorant.</p>
                    </div>
                    <div class="profile-setting tab">
                        <h1><center>Account Settings</center></h1>
                        <p>Valorant,a mentally depressing game that when you start playing you dont want to quit cuz its so addictive.
                            Valorant is like drugs, you wanna quit but you cant cuz Riot games is probably a chinese org that tracks you with drones and when you sleep they probably put a chip in your brain to make you play more Valorant.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./jquery/jquery.js"></script>
    <script src="hg.js"></script>
    <script>
        let subMenu=document.getElementById("subMenu");
        let subMenu1=document.getElementById("subMenu1");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
        function toggleMenu1(){
            subMenu1.classList.toggle("open-menu1");
        }
    </script>
    <script>var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}</script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<style>
.a{
    padding: 10px;
    margin: 5px 2px;
    width: 100%;
}
.a:link {
  color: white;
  background-color: transparent;
  text-decoration: none;
}

.a:visited {
  color: white;
  background-color: transparent;
  text-decoration: none;
}

.a:hover {
  color: black;
  background-color: transparent;
  text-decoration: none;
}

.a:active {
  color: white;
  background-color: transparent;
  text-decoration: none;
}
</style>

</body>
</html>


