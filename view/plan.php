<?php
    require_once '../controller/serviceC.php';
        
    require_once '../model/User.php';
    require_once '../connexion.php';
    include_once '../controller/nudes.php';
    $serviceC =new serviceC();
    $liste=$serviceC->showservices();
    $liste1=$serviceC->showservices();
    $score=-1;
    if ((isset( $_SESSION['score']))&&(!empty($_SESSION['score'])))
    {
        $score=$_SESSION['score'];
        echo $score;
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleplan.css">
    
    <link rel="stylesheet" href="site.css">
    <title>Document</title>
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

    <form class="board" action="validationplan.php" method="post" >
<?php
    foreach ($liste as $service)
    {
?>

<div class='row'>  
    <div class="icon">
        <?php
        if ($score>-1)
        {
            $score--;
        ?>
        <div class="arrow">recommand</div>
        <?php
        }
        ?>
        
    </div>
    <div class='xd'>
        <label class="container">
            <input type="checkbox" name="<?php echo $service['nom'];?>" value="y">
            <span class="checkmark"></span>
        </label>
        <a class="arya" ><?php echo $service['nom'];?></a>
    </div>

    <div class='btn'>
            <a id="myBtn<?php echo $service['id']; ?>" class="check">check more</a>
    </div>
</div>




<?php
    }
?>

                
        <div class="fb">
            <input type="submit" class='fbtn' id="SUB">
            <input type="reset" class='fbtn' value="clear">
        </div>

    </form>

 <?php
    foreach ($liste1 as $service)
    {
?>
    
<div id="myModal<?php echo $service['id']; ?>" class="modal">	

<!-- Modal content -->
    <div class="modal-content">
        <a id="close<?php echo $service['id']; ?>" name="close<?php echo $service['id']; ?>"  class="close">&times;</a>
        <p><?php echo $service['description']; ?></p>
        <p>prix = <?php echo $service['prix']; ?></p>
    </div>
            

</div>
<script>
                        
    var b<?php echo $service['id']; ?>=0;
    document.getElementById("myModal<?php echo $service['id']; ?>").style.display = "none";

    // When the user clicks the button, open the modal 
    document.getElementById("myBtn<?php echo $service['id']; ?>").addEventListener('click',function(){
    b<?php echo $service['id']; ?>=1;       
    document.getElementById("myModal<?php echo $service['id']; ?>").style.display = "block";
    });

    // When the user clicks on <span> (x), close the modal
    document.getElementById("close<?php echo $service['id']; ?>").addEventListener('click',function(){
    b<?php echo $service['id']; ?>=0;
    document.getElementById("myModal<?php echo $service['id']; ?>").style.display = "none";
    });

    

</script>

<script>
    let subMenu=document.getElementById("subMenu");
    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
    
</script>
        


<?php
    }
?>
    
</body>   

</html>
