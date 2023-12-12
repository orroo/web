<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <script src="../controller/test.js"></script>
</head>
<body>
    <header>
        <a href="#"><img src="a.png" alt="" height="60%" width="60%"></a>
        <nav class="navigation">
            <a href="#">home</a>
            <a href="#">about</a>
            <a href="#">services</a>
            <a href="#">contact</a>
            <button class="payment">log in</button>
        </nav>
    </header>
    <div class="hi">

        <form action="updatecred.php" method="post">
            <div class="row">
    
                <div class="col">
                    <h3 class="titre">billing address</h3>
    
                    <div class="inputbox">
                        <span>full name :</span>
                        <input type="text" id="name" name="name" placeholder="yahya elkaed" Value=<?php echo $_POST['fname']; ?> >
                    </div>
                    <div class="inputbox">
                        <span>email :</span>
                        <input type="text" id="email" placeholder="example@example.com" name="mail">
                    </div>
                    <div class="inputbox">
                        <span>address :</span>
                        <input type="text" placeholder="room - street - locality" name="address" >
                    </div>
                    <div class="inputbox">
                        <span>city :</span>
                        <input type="text" placeholder="manouba" id="city" name="city">
                    </div>
                    <div class="flex">
                        <div class="inputbox">
                            <span>state :</span>
                            <input type="text" placeholder="tunis" id="state" name="state">
                        </div>
                        <div class="inputbox">
                            <span>zip code :</span>
                            <input type="text" placeholder="123 456" id="zip" name="zip">
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
                        <input type="text" placeholder="mr.yahya elkaed" id="namec" name="noc">
                    </div>
                    
                    <div class="inputbox">
                        <span>credit card number :</span>
                        <input type="text   " placeholder="1111-2222-3333-4444" id="card" name="ccn">
                    </div>
                    <div class="inputbox">
                        <span>exp date :</span>
                        <input type="date" placeholder="date" id="xp" name="xp">
                    </div>
                    <div class="flex">
                        <div class="inputbox">
                            <span>CW :</span>
                            <input type="text" placeholder="1234" id="cw" name="cw">
                        </div>
                    </div>
                </div>
    
    
            </div>
    
            <input type="submit" value="proceed to chekout" class="submit-btn" onclick=" return verif()" id="butt">
    
    
        </form>
    
    </div>
    
</body>
</html>