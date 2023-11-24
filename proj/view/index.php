<?php






include_once '../model/Post.php';
include_once '../controlleur/PostC.php';
echo '<a href="javascript:void(0);" onclick="redirectToIndex()">⮜</a>';
echo '<script>
        function redirectToIndex() {
            window.location.href = "index2.html";
        }
      </script>';


$error = "";


if (isset($_POST['post'])) {
    $postC = new PostC(); 

    
    $targetDir = "uploads/";

    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        
      
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
           
            $imagePath = $targetFile;
        } else {
            echo "Une erreur s'est produite lors du téléchargement de l'image.";
            exit;
        }
    } else {
        
        $imagePath = null;
    }



     if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $targetDir = "uploads/";
        $targetVideo = $targetDir . basename($_FILES["video"]["name"]);
    
    
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetVideo)) {
            
            $videoPath = $targetVideo;
        } else {
            echo "Une erreur s'est produite lors du téléchargement de la vidéo.";
            exit;
        }
    } else {
        
        $videoPath = null;
    }


    $cred = new Post(
        null,
        $imagePath,
        $videoPath,
        
        
        $_POST['post'],
        null,
        
    );

    // Insertion du post dans la base de données
    $postC->InsertPost($cred);
    header('Location: ' . $_SERVER['PHP_SELF']);
exit;

}



if (isset($_POST['delete'])) {
    $postC = new PostC(); 
    $postIdToDelete = $_POST['delete'];
    $postToDelete = new Post($postIdToDelete, null, null, null, null, null);
    $postC->DeletePost($postToDelete);
}


if (isset($_POST['update'])) {
    $postC = new PostC(); 
    $postIdToUpdate = $_POST['update'];
    $updatedText = $_POST['updated_text'];

    $postToUpdate = new Post($postIdToUpdate, null, null, $updatedText, null, null);
    $postC->UpdatePost($postToUpdate);
}


$postC = new PostC();  

    $messages = $postC->getMessages();
   


    foreach ($messages as $message) {
        echo '<!DOCTYPE html>';
        echo '<html lang="fr">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<link rel="stylesheet" href="indexcssp.css">';
        echo '<title>Publication élégante</title>';
        echo '</head>';
        echo '<body>';
    
        echo '<div class="post-container">';
        echo '<div class="post-header">';
        echo '<div class="user-info">';
        echo '<img src="user-avatar.jpg" alt="" style="width: 40px; height: 40px; border-radius: 50%;">';
        echo '<span style="margin-left: 10px;">' . $message['id'] . '</span>';
        echo '</div>';
        echo '<span>Publié le ' . $message['datePublication'] . '</span>';
        echo '</div>';
        echo '<div class="post-content">';
        echo '<p>' . $message['texte'] . '</p>';
        if (!empty($message['image'])) {
            echo '<img src="' . $message['image'] . '" alt="Image du post">';
        }


        if (!empty($message['video'])) {
            echo '<video width="1050" height="400" controls>';
            echo '<source src="' . $message['video'] . '" type="video/mp4">';
            echo 'Votre navigateur ne supporte pas la lecture de la vidéo.';
            echo '</video>';
        }

        echo '</div>';
        echo '<div class="post-actions">';
        echo '<div class="action-buttons">';
        echo '<button class="like-btn">J\'aime</button>';
        echo '<button class="comment-btn">Commenter</button>';
        echo '<button class="share-btn">Partager</button>';
        echo '</div>';
        echo '<div class="action-buttons">';
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="delete" value="' . $message['id'] . '">';
        echo '<input type="submit" value="Supprimer" class="delete-btn">';
        echo '</form>';
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="update" value="' . $message['id'] . '">';
        echo '<input type="text" name="updated_text" placeholder="Nouveau texte">';
        echo '<input type="submit" value="Mettre à jour" class="update-btn">';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    
        echo '</body>';
        echo '</html>';
    }
?>                              