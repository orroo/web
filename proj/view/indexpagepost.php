

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexpagepost.css">
    <title>Publication élégante</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>


    <div class="post-container">
        <div class="post-header">
            <div class="user-info">
                <ion-icon name="person-sharp"></ion-icon>
                <span><?php  echo  $message['idUtilisateur']; ?></span>
                
            </div>
            <div class="post-details">
                <span class="post-date">Publié le <?php echo $message['datePublication']; ?></span>

 

                <a href="indexmodifier.php?update=<?php echo $message['id']; ?>" class="update-btn">
    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
</a>


                <form method="post" action="">
                    <input type="hidden" name="delete" value="<?php echo $message['id']; ?>">
                    <button class="delete-btn" type="submit"><ion-icon name="close-circle-outline"></ion-icon></button>
                </form>
              
            </div>
        </div>

        <div class="post-content">
            <p><?php echo $message['texte']; ?></p>
            <?php if (!empty($message['image'])) : ?>
                <img src="<?php echo $message['image']; ?>" alt="Image du post">
            <?php endif; ?>
            <?php if (!empty($message['video'])) : ?>
                <video width="1050" height="400" controls>
                    <source src="<?php echo $message['video']; ?>" type="video/mp4">
                </video>
            <?php endif; ?>
        </div>

        <div class="post-actions">
            <div class="action-buttons">
                <button class="like-btn"><ion-icon name="heart-outline"></ion-icon></button>


                <form method="post" action="indexcommentaire.php" id="<?php echo $message['id']; ?>">
    <input type="hidden" name="idPost" value="<?php echo $message['id']; ?>">
    <button class="comment-btn" type="button" onclick="redirectToCommentPage(<?php echo $message['id']; ?>)">
        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
    </button>
</form>
       <button class="share-btn" onclick="fcb()" >       <ion-icon name="arrow-redo-circle-outline"></ion-icon>   </button>
            </div>
        </div>
    </div>
   
   <script>
    function redirectToCommentPage(messageId) {
    console.log('messageId:', messageId);
    window.location.href = 'indexcommentaire.php?id=' + messageId;


    
}







</script>


</body>

</html>
