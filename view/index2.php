<?php
require_once '../connexion.php';
if ((isset($_SESSION['Username']))&&(!empty($_SESSION['Username'])))
{
    $idc=$_SESSION['Username'];
    unset($_SESSION['back']);
}
else 
{
    $_SESSION['back']='index2.php';
    header('location:login.php');
    exit;
}
?>

<html>

<head>

  <title> post</title>
  <link rel="stylesheet" href="index2.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="index1.js">   </script>

</head>

<body>


 
  <div class="contrainer">
    <div class="wrapper">
      <section class="post">
        
        <header> <B>  <a href="index1.html"> ⮜ </a>  CRIER POST </B> 
          <br><br>
           
                     
          
        </header>
      
          
        
      
          <form action="indexforum.php" method="post" enctype="multipart/form-data" onsubmit="return validateFormAndSubmit()" >
          <div class="contenet">
              
            <ion-icon name="person-sharp"></ion-icon>
            <div class="details">
              <p> <b><i>nom utulisateur</i></b></p>
            </div>
          </div>
         
     
         
          <textarea  class="textarea"  name="post" placeholder="QUE VOULEZ-VOUS DIRE? " ></textarea>
           


          <div class="theme">
            <img src="file:///C:/Users/msi/AppData/Local/Temp/ef23bfb0-1b49-4fad-9311-4b759ef03391_fb-icons.zip.391/fb-icons/theme.svg" alt="">
            <img src="file:///C:/Users/msi/AppData/Local/Temp/5fd5e69c-6aac-4852-8ffb-8937fe29b7a0_fb-icons.zip.7a0/fb-icons/emoji.svg" alt="">
           
          </div>

          <div class="option">
          <p> Ajouter à votre publication   </p>
          <ul class="list">
            <input type="file" id="inputpc" name="image" style="display: none;" onchange="afficherPhoto(this)" >
          <li onclick="importerpc()"><ion-icon  name="image-outline" name="image"  ></ion-icon> </li>  

          </li>
          <input type="file" name="video" accept="video/*" style="display: none;">
          <li onclick="previousElementSibling.click()">
            <ion-icon  name="camera-reverse-outline" ></ion-icon>
          </li>
            
                 
          </ul>
          </div>
<input type="submit" class="button" value="PUBLIER" onclick="validateFormAndSubmit()" >


<br><br><br>
        </form>

      </section>
    </div>
  </div>


</body>



</html>







