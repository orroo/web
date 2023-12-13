<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Mental Harbour </title>
    <link rel="stylesheet" href="fk.css">
    <br>
    <a style="margin-left: 20px;"></a><a href=””><img src="a.png" height = 15% width = 15% alt="Image 1"></a>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <section>
        <div class="main">
            <br>
            <h1><center>Sign In</center></h1>
            <div class="accounts">
                <a href="http://localhost/shit/view/testlogin/login.php"><button class="a" id="g"><img src="g.png"><span>Continue with Google</span></button></a>
                <a href="https://www.facebook.com/?locale=ar_AR"><button class="a" id="f"><img src="f.png"><span>Continue with Facebook</span></button></a>
                <a href="https://twitter.com/?lang=ar"><button class="a" id="t"><img src="t.png"><span>Continue with Twitter</span></button></a>
            </div>
            <hr>
            <div class="log-in">
                <form action="http://localhost/shit/view/veriflogin.php" method="post">
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="mail"></ion-icon>
                        </span>
                        <input id="email" type="text" name="mail" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="lock-closed"></ion-icon>
                        </span>
                        <input id="password" type="password" name="ps" required>
                        <label>Password</label>
                    </div>
                    

                    <div class="switch">
                        <input type="checkbox" id="switch" checked>
                        <label for="switch"></label>
                    </div>

                    <div class="g-recaptcha" data-sitekey="6LceISYpAAAAAJXghr00rV9kpkkqsk45T3K0h6cS"></div>

                    <button onclick="return verif_login()">Log In</button>


                    <a href="mail.html">Forgot your password?</a>
                </form>
            </div>


            <div class="last">
                <span>Don't you have an account?</span>
                
                <a href="register.html" class="register-link">Sign up for Mental Harbour</a>
            </div>
            <hr>
        </div>
        
    </section>
    <script src="../controller/login.js"></script>
</body>
<footer>
    <section>
        <div class="footer">
            <p>                            </p>
            <a><center>This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply.</center></a>
            <br>
        </div>
    </section>
</footer>
<style>
    .input-box{
        position: relative;
        width: 110%;
        height: 50px;
        border-bottom: 2px solid black;
        padding: 0 35px 0 5px;
    }
</style>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</html>