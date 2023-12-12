<?php
    require_once '../controller/serviceC.php';
    $serviceC =new serviceC();
    $liste=$serviceC->showservices();
    $liste1=$serviceC->showservices();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleplan.css">
    <title>Document</title>
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

    <form class="board" action="validationplan.php" method="post" >
<?php
    foreach ($liste as $service)
    {
?>

<div class='row'>  
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
        


<?php
    }
?>
    
</body>   

</html>
