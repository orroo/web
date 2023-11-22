<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h2 class="logo">mental harbor</h2>
        <nav class="navigation">
            <a href="#">home</a>
            <a href="#">about</a>
            <a href="#">services</a>
            <a href="#">contact</a>
            <button class="payment">log in</button>
        </nav>
    </header>
    <form class="board" action="http://localhost/P/view/updateplan.php?id=<?php echo $_POST["id"]; ?>" method="post"  onsubmit="return VERIFplan()">
        <div>  
            <label class="container">
                <input type="checkbox" name="med" id="med" value="y">
                <span class="checkmark"></span>
            </label>
            <a>mediation</a>
        </div>
        <div>  
            <label class="container">
                <input type="checkbox" name="test" id="test" value="y">
                <span class="checkmark"></span>
            </label>
            <a>test</a>
        </div>
        <div>  
            <label class="container">
                <input type="checkbox" name="psy" id="psy" value="y">
                <span class="checkmark"></span>
            </label>
            <a>psychiatry</a>
        </div>
        <div>  
            <label class="container">
                <input type="checkbox" name="ther" id="ther" value="y">
                <span class="checkmark"></span>
            </label>
            <a>therapy</a>
        </div>
        <div>
            <input type="submit" value="update" id="SUB">
            <input type="reset" value="clear">
        </div>

    </form>

    <script src="../controller/select.js"></script>
</body>     
</html>