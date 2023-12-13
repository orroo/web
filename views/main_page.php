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
    <link rel="stylesheet" href="site.css">
</head>
<body>
    <div class="hero">
        <nav>
            <a href=""><img src="a.png" class="logo" height="60%" width="60%" alt="Image 1"></a>
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

        <div class="content">
            <h1 style="color: white ;">Introducing Mental Harbour, a mental<br> health collective.</h1>
            <p style="color: white ;">Get accessible and personalized mental healthcare in-person or from the comfort of your home. </p>
            
        </div>
    </div>
    <div class="mero">
        <h1>Our approach</h1>
    </div>
    <div class="paragraph">
        <center><p>We are a group of doctoral-level psychologists and psychiatrists who provide quality mental health care. As a mental health collective, we assist members by providing therapy, medication management, coaching, and more. Let us help you connect with one of our doctors who meets your needs and is available to see you, online or in-person. We tend to keep our patients identities anonymous for their comfort .</p></center>
    </div>
    <div class="learn">
        <a href="#"class="btn">Learn more</a>
    </div>
    <br><br><br>
<div class="fk">
    <img src="ha.png" class="f" alt="Image 2">
    <div class="lero">
        <h1>Providing you with a safe space to relax</h1>
        <p>All your appointments will take place in our soothing office environment with fully private rooms, or if you prefer staying at home and booking an appointment online.</p>
    </div>
</div>
    <br><br><br>
    <br><br><br><br><br><br>
    <section class="mm">
        <center><h1>Our Services</h1></center>
        <div class="row">
            <div class="c">
            <img src="https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924019-AQPZM7QK25J33VKNIGMV/Thrapy+copy+2.png" width="400px" height="200px">
            <center><h2 style="color: white;">Therapy</h2></center>
            </div>
            <div class="c">
                <img src="https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924024-JRIAPMEPVYEU598UIAKF/Pills+copy+2.png" width="400px" height="200px">
            <center><h2 style="color: white;">Psychiatry</h2></center>
            </div>
            <div class="c">
                <img src="https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924031-YXADIDPIOUVJ41WLFVKJ/Coaching+copy.png" width="400px" height="200px">
            <center><h2 style="color: white;">Tests about mental health</h2></center>
            </div>
            <div class="c">
                <img src="https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924036-G0TE4WZ8BW74BRIHOQEA/Accupuncture+copy+2.png" width="400px" height="200px">
            <center><h2 style="color: white;">Meditation</h2></center>
            </div>
        </div>
        <div class="learnn">
            <a href="#"class="btn">Learn more</a>
        </div>
    </section>
    <section class="nn">
        <center><h1>“Mental Harbour helped me find a therapist that I connected with, whose services aligned with my needs, and who was flexible with their scheduling.”</h1></center>
        <center><p>— X, Mental Harbour client</p></center>
    </section>
    <section class="oo">
        <center><h1>Our blogs</h1></center>
        <center><div class="row">
            <div class="c">
            <img src="https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924064-WOHVMSVYEXR1JMCVJXES/image-asset.jpeg?format=100w 100w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924064-WOHVMSVYEXR1JMCVJXES/image-asset.jpeg?format=300w 300w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924064-WOHVMSVYEXR1JMCVJXES/image-asset.jpeg?format=500w 500w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924064-WOHVMSVYEXR1JMCVJXES/image-asset.jpeg?format=750w 750w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924064-WOHVMSVYEXR1JMCVJXES/image-asset.jpeg?format=1000w 1000w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924064-WOHVMSVYEXR1JMCVJXES/image-asset.jpeg?format=1500w 1500w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924064-WOHVMSVYEXR1JMCVJXES/image-asset.jpeg?format=2500w 2500w " width="380px" height="280px">
            <center><h2>This Morning Routine Will Improve Your Mood</h2></center>
            <br><br>
            <a href="https://clove-demo.squarespace.com/blog/how-changing-your-morning-routine-will-improve-your-mood">Read more</a>
            </div>
            <div class="c">
                <img src="https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924069-60TCZGS2QH21CIK6V15O/image-asset.jpeg?format=100w 100w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924069-60TCZGS2QH21CIK6V15O/image-asset.jpeg?format=300w 300w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924069-60TCZGS2QH21CIK6V15O/image-asset.jpeg?format=500w 500w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924069-60TCZGS2QH21CIK6V15O/image-asset.jpeg?format=750w 750w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924069-60TCZGS2QH21CIK6V15O/image-asset.jpeg?format=1000w 1000w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924069-60TCZGS2QH21CIK6V15O/image-asset.jpeg?format=1500w 1500w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924069-60TCZGS2QH21CIK6V15O/image-asset.jpeg?format=2500w 2500w" width="380px" height="280px">
            <center><h2>How to Take An Effective Mental Health Day Off</h2></center>
            <br><br>
            <a href="https://clove-demo.squarespace.com/blog/how-to-take-an-effective-mental-health-day">Read more</a>
            </div>
            <div class="c">
                <img src="https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924074-LRT85VJ7ETULEK9DHCA5/image-asset.jpeg?format=100w 100w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924074-LRT85VJ7ETULEK9DHCA5/image-asset.jpeg?format=300w 300w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924074-LRT85VJ7ETULEK9DHCA5/image-asset.jpeg?format=500w 500w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924074-LRT85VJ7ETULEK9DHCA5/image-asset.jpeg?format=750w 750w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924074-LRT85VJ7ETULEK9DHCA5/image-asset.jpeg?format=1000w 1000w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924074-LRT85VJ7ETULEK9DHCA5/image-asset.jpeg?format=1500w 1500w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924074-LRT85VJ7ETULEK9DHCA5/image-asset.jpeg?format=2500w 2500w" width="380px" height="280px">
            <center><h2>Exercises To Calm Your Anxious Thoughts</h2></center>
            <br><br>
            <a href="https://clove-demo.squarespace.com/blog/exercises-to-calm-your-anxious-thoughts">Read more</a>
            </div>
            <div class="c">
                <img src="https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924079-Z3NOPL4ZRSCLZ1TS0EP5/image-asset.jpeg?format=100w 100w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924079-Z3NOPL4ZRSCLZ1TS0EP5/image-asset.jpeg?format=300w 300w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924079-Z3NOPL4ZRSCLZ1TS0EP5/image-asset.jpeg?format=500w 500w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924079-Z3NOPL4ZRSCLZ1TS0EP5/image-asset.jpeg?format=750w 750w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924079-Z3NOPL4ZRSCLZ1TS0EP5/image-asset.jpeg?format=1000w 1000w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924079-Z3NOPL4ZRSCLZ1TS0EP5/image-asset.jpeg?format=1500w 1500w, https://images.squarespace-cdn.com/content/v1/624b503b5d73881124e70a24/1649102924079-Z3NOPL4ZRSCLZ1TS0EP5/image-asset.jpeg?format=2500w 2500w" width="380px" height="280px">
            <center><h2>The Beginners Guide to Meditation</h2></center>
            <br><br>
            <a href="https://clove-demo.squarespace.com/blog/the-beginners-guide-to-meditation">Read more</a>
            </div></center>
        </div>
    </section>
    <section class="pp">
        <center><h1>Get started with Mental Harbour, today.</h1></center>
        <div class="learnnn">
            <center><a href="#"class="btn" style="margin-right: -5px; margin-top: 35px;">Book a consultation</a></center>
        </div>
        <br><br><br><br><br><br>
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
                <a href="http://localhost/shit/view/login.php">Get Started</a>
            </div>
        </div>
    </section>
</body>
</html>
<style>

::-webkit-scrollbar {
    width: 15px;
  }
  ::-webkit-scrollbar-track {
    background-color: white;
  }
  ::-webkit-scrollbar-thumb {
    background-color: #4D5C55;
  }
  ::-webkit-scrollbar-thumb:hover {
    background-color: #586b62;

  }
    


    .btn{
    display: inline-block;
    text-decoration: none;
    padding: 14px 40px;
    margin-right:-200px;
    color: white;
    background: hsl(17.24deg 47.48% 64.3%);
    font-size: 14px;
    z-index: 1000;
}
.oo h1{
    font-size:60px;
    color: #3F4A49;
    font-family: 'Times New Roman', Times, serif;
    margin-top: -40%;
}
.learnn{
    margin-left: 46%;
    margin-top: 7%;
    max-width: 900px;
}
.nn h1{
    font-size:45px;
    color: #3F4A49;
    font-family: 'Times New Roman', Times, serif;
    margin-top: -22%;
    max-width: 1200px;
}
.pp h1{
    font-size:80px;
    color: #f2f2ef;
    font-family: 'Times New Roman', Times, serif;
    margin-top: -21%;
    max-width: 1200px;
}
.nn p{
    margin-top: 5%;
}
.learnn .btn{
    display: inline-block;
    text-decoration: none;
    padding: 20px 40px;
    margin-right:-200px;
    color: white;
    background: hsl(17.24deg 47.48% 64.3%);
    font-size: 14px;
    z-index: 1000;
}
.learnnn .btn{
    display: inline-block;
    text-decoration: none;
    padding: 22px 160px;
    color: white;
    background: hsl(17.24deg 47.48% 64.3%);
    font-size: 18px;
    z-index: 1000;
}
.mm{
    padding-top: 40%;
    background-color: #4C5C5C;
}
.pp{
    padding-top: 32%;
    background-color: #4C5C5C;
}
.qq{
    padding-top: 16%;
    background-color: white;
}
.nn{
    padding-top: 32%;
    background-color: #DCDCD4;
}
.oo{
    padding-top: 47%;
    background-color: white;
}
.row{
    margin-top: 5%;
    display: flex;
    justify-content: space-between;
}
.qq .row{
    margin-top: -13%;
    margin-right: 19%;
    margin-left: 19%;
    display: flex;
    justify-content: space-between;
}
.oo .row{
    margin-top: 7%;
    margin-right: 8%;
    margin-left: 10%;
    display: flex;
    justify-content: space-between;
}
.oo .c h2{
    margin-top: 30px;
    max-width: 320px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: #3F4A49;
    font-size: 27px;
}
.oo .c a{
    font-family: ok;
    color: hsl(17.24deg 47.48% 64.3%);
    text-decoration: underline;
    padding-bottom: 47%;
}
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
.c h2{
    margin-top: 20px;
    font-family: 'Times New Roman', Times, serif;
}
.fk{
    margin-top: 7%;
    display: block;
    margin-bottom: 4%;
}
.f{
    display: flex;
    height: 650px;
    width: 650px;
    padding-top: 0;
    padding-bottom: 0;
    margin-left: 13%;
}
.learn{
    margin-left: 42%;
    margin-top: 2%;
    max-width: 900px;
}
.learn .btn{
    display: inline-block;
    text-decoration: none;
    padding: 14px 100px;
    margin-right:-200px;
    color: white;
    background: hsl(17.24deg 47.48% 64.3%);
    font-size: 14px;
    z-index: 1000;
}
.content{
    margin-left: 14%;
    margin-top: 21%;
    max-width: 680px;
}
.content h1{
    font-size:60px;
    color: white;
    font-family: 'Times New Roman', Times, serif;
}
.mm h1{
    font-size:60px;
    color: white;
    font-family: 'Times New Roman', Times, serif;
    margin-top: -35%;
}
.content p{
    font-size:20px;
    margin: 45px 0 30px;
    color: white;
    font-family: ok;
}
.lero{
    margin-left: 55%;
    max-width: 680px;
    margin-top: -25%;
}
.lero h1{
    font-size:60px;
    color: #3F4A49;
    font-family: 'Times New Roman', Times, serif;
}
.lero p{
    margin-top: 8%;
    font-size:23px;
    color: #3F4A49;
    font-family:ok;
}
.mero{
    margin-left: 38%;
    margin-top: 7%;
    max-width: 700px;
}
.mero h1{
    font-size:60px;
    color: #3F4A49;
    font-family: 'Times New Roman', Times, serif;
}
.paragraph p{
    margin-top: 2%;
    font-size:23px;
    color: #3F4A49;
    font-family:ok;
    max-width: 1100px;
}
</style>



    </div>

    <script>
        let subMenu=document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>
<style>
    .btn{
    display: inline-block;
    text-decoration: none;
    padding: 14px 40px;
    color: white;
    background: hsl(17.24deg 47.48% 64.3%);
    font-size: 14px;
    z-index: 1000;
}
.content{
    margin-left: 14%;
    margin-top: 21%;
    max-width: 600px;
}
.content h1{
    font-size:70px;
    color: #222;
}
.content p{
    margin: 10px 0 30px;
    color: #333;
}
</style>