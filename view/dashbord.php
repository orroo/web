<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="dashstyle.css">

    <title>Admin Board</title>
</head>
<body>
    <div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="accessibility-outline"></ion-icon></span>
                    <span class="title">Mental Harbour</span>
                </a>
            
            </li>
            <li>
                <a href="testsdash.html">

                    <span class="icon"><ion-icon name="receipt-outline"></ion-icon></span>
                    <span class="title">Tests</span>
                </a>
            </li>
            
            <li>
                <a href="questiondash.html">
                    <span class="icon"><ion-icon name="reader-outline"></ion-icon></span>
                    <span class="title">Questions</span>
                </a>
            
            </li>
            <li>
                <a href="resultsdash.html">
                    <span class="icon"><ion-icon name="file-tray-stacked-outline"></ion-icon></span>
                    <span class="title">Clients</span>
                </a>
            
            </li>
        </ul>
    </div>
</div>

<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>

        <div class="search">
            <label>
                <input type="text" placeholder="Search here">
                <ion-icon name="search-outline"></ion-icon>
            </label>
        </div>

        <div class="user">
            <img src="assets/imgs/customer01.jpg" alt="">
        </div>
    </div>
    <div class="cardBox">
        <div class="card">
            <div>
                <div class="numbers">100</div>
                <div class="cardName">Daily Visitors</div>
            </div>

            <div class="iconBx">
                <ion-icon name="eye-outline"></ion-icon>
            </div>
        </div>

        <div class="card" id="testsCard">
            <div>
                <div class="numbers" id="totalTests">Loading...</div>
                <div class="cardName">Total Tests</div>
            </div>

            <div class="iconBx">
                <ion-icon name="receipt-outline"></ion-icon>
            </div>
        </div>
        <script>
            
            fetch('counttests.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('totalTests').innerText = data.testCount;
                })
                .catch(error => console.error('Error fetching data:', error));
        </script>
        <div class="card">
            <div>
                <div class="numbers" id="totalQuestions">Loading ...</div>
                <div class="cardName">Total Questions</div>
            </div>

            <div class="iconBx">
                <ion-icon name="reader-outline"></ion-icon>
            </div>
        </div>
        <script>
            fetch('countquestions.php')
                .then(response => response.json())
                .then(data => { 
                    document.getElementById('totalQuestions').innerText = data.questionCount;
                })
                .catch(error => console.error('Error fetching data:', error));
        </script>

        <div class="card">
            <div>
                <div class="numbers">3</div>
                <div class="cardName">Clients</div>
            </div>

            <div class="iconBx">
                <ion-icon name="file-tray-stacked-outline"></ion-icon>
            </div>
            
        </div>
        <div class="card">
        <div>
            <div class="cardName">Send Mail</div>
        </div>

        <div class="iconBx">
            <ion-icon name="mail-outline"></ion-icon>
        </div>

        <form method="post" action="mailer.php">
            <input type="submit" name="sendMail" value="Send Mail">
        </form>
    </div>
        
    </div>

<script src="C:\xampp\htdocs\TEST\view/dash.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>