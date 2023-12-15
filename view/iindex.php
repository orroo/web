<?php
    
    require_once '../connexion.php';
?>
<html lang="en">

<head>
    <link rel="stylesheet" href="index1.css">
    
    <link rel="stylesheet" href="site.css">
    <script src="indexV.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="banner">
    <nav>
            <a href="main_page.php"><img src="a.png" class="logou" height="60%" width="60%" alt="Image 1"></a>
            <ul>
                <li><a href="indexforum.php">forum</a></li>
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
    </div>  

    <main>
        <section>
            <h2>ABOUT</h2>
            <p class="description">Navigate our site effortlessly, finding exercises that align with your goals, whether it's enhancing focus, promoting better sleep, or fostering emotional resilience.</p>
            <p class="description">Engage with our community through forums and discussion boards to share experiences, tips, and insights, creating a supportive network on your mindfulness journey.</p>
        </section>

        <h2>Upload Video</h2>
        <!-- Your existing video upload form here -->
        <form action="indexV.php" method="post" enctype="multipart/form-data">
            <label for="video">Select video to upload:</label>
            <br><br><br>
            <label for="videoType">Video Type:</label>
            <input type="text" name="post" id="videoType">
            <br><br><br>
            <input type="file" name="video" accept="video/*  ">
            <br><br><br>
            <input type="submit" value="Upload Video">
        </form>
        <form action="testV.php" method="post" onsubmit="return validateFormAndSubmit()">
            <section class="comment-section">
                <h2>Comments</h2>
                <div class="comment-form">
                    <textarea name="post" placeholder="Add your comment"></textarea>
                    <button type="submit" name="submit">Submit</button>
                </div>
            </section>
        </form>
        <script>
            function validateFile() {
                var fileInput = document.querySelector('input[type="file"]');
                if (fileInput.files.length === 0) {
                    alert("Please select a file before uploading.");
                    return false;
                }
                return true;
            }
        </script>
    </main>
    <script>
        let subMenu=document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>

</html>
