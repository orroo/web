<?php


include_once '../model/Comentaire.php';
include_once '../controller/CommentairC.php';


echo '<a href="javascript:void(0);" onclick="redirectToIndex()">⮜</a>';
echo '<script>
        function redirectToIndex() {
            window.location.href = "indexforum.php";
        }
      </script>';


$error = "";

$idPost = isset($_GET['id']) ? $_GET['id'] : null;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $commentaireC = new CommentaireC();

    // Ajout d'un commentaire
    $idPost = isset($_POST['id']) ? intval($_POST['id']) : null;
    $texte = $_POST['texte'];

    $commentaire = new Commentaire(
        null,
        $texte,
        $idPost,
        null,
        null
    );

    $commentaireC->InsertCommentaire($commentaire);
 
   
  
}


if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['supprimer_commentaire'])) {
    
  
    $commentToDelete = new CommentaireC();
    $commentId= $_GET['commentaire_id'];


    $comment=new Commentaire( $commentId,null,null,null,null);
    $_SESSION['idPost'] = $idPost;
    echo "Avant suppression - ID du post (session) : " . htmlspecialchars($_SESSION['idPost']);
    
    $commentToDelete->DeleteCommentaire($comment);

  

    
}


if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['update'])) {
   
    
    $comt = new CommentaireC();
    $comtIdToUpdate = $_GET['commentaire_id'];
    $updatedText = $_GET['updated_text'];

    // Appeler la fonction de mise à jour du commentaire
    $comt->UpdateCommentaire($comtIdToUpdate, $updatedText);


}


$commentaireC = new CommentaireC();
$commentaires = $commentaireC->SelectCommentairesByPostId($idPost);

?>
<?php
foreach ($commentaires as $commentaire) {

    if ($commentaire['idPost'] == $idPost) {
      
        echo '<div class="comment-container">';
     
        echo '<p> <ion-icon name="person-sharp"></ion-icon>'  . $commentaire['idUtilisateur'] . '</p>';
        echo '<p>Texte: ' . $commentaire['texte'] . '</p>';
    
        // Formulaire de suppression
      
        echo '<form class="comment-form" action="' . $_SERVER['PHP_SELF'] . '?id=' . $idPost . '" method="GET">';
        echo '<input type="hidden" name="id_post" value="' . $idPost . '">';
echo '<input type="hidden" name="commentaire_id" value="' . $commentaire['id'] . '">';
echo '<input type="submit" name="supprimer_commentaire" value="Supprimer" >';
echo '</form>';



        // Formulaire de modification avec champ de texte
        echo '<form class="comment-form" action="' . $_SERVER['PHP_SELF'] . '?id=' . $idPost . '" method="GET">';
        echo '<input type="hidden" name="commentaire_id" value="' . $commentaire['id'] . '">';
          
        // Ajout des événements onmouseover, onmouseout et onclick
        echo '<input type="button" value="Modifier" onmouseover="activerChampTexte(' . $commentaire['id'] . ')" onmouseout="desactiverChampTexte(' . $commentaire['id'] . ')" onclick="cacherChampTexte(' . $commentaire['id'] . ')">';
        echo '<textarea id="champTexte' . $commentaire['id'] . '" name="updated_text" rows="3" cols="40" style="display:none;" placeholder="Nouveau commentaire" readonly></textarea>';
        echo '<input type="submit" name="update" value="Enregistrer">';
        echo '</form>';
        
        echo '</div><br>';
        
    }     
    
}

// Ajout du script JavaScript
echo '<script>
    function activerChampTexte(commentaireId) {
        var champTexte = document.getElementById("champTexte" + commentaireId);
        champTexte.style.display = "block";
        champTexte.removeAttribute("readonly");
    }

 
</script>';


 echo '<style>
 
 body {
    font-family: \'Arial\', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.comment-container {
    background-color: #ffffff;
    padding: 15px;
    margin: 15px 0;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
}

.comment-details {
    margin-bottom: 10px;
}

ion-icon {
    font-size: 24px;
    margin-bottom: 10px;
    color: #3498db;
}

.comment-details p {
    margin: 0;
    color: #333;
}

.comment-form {
    text-align: right;
}

input[type="submit"],
input[type="button"] {
    background-color: #4caf50;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    margin-left: 5px;
}

textarea {
    width: calc(100% - 20px);
    margin-top: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}
</style>';







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Commentaire</title>
</head>
<body>

<!-- Formulaire pour ajouter un commentaire -->
<form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $idPost; ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $idPost; ?>">
    <label for="texte">Texte du commentaire :</label>
    <textarea name="texte" id="texte" rows="4" required></textarea>
    <input type="submit" name="post" value="Ajouter Commentaire">
</form>
<div id="bottom"></div>










<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    window.onload = function() {
        window.location.href = "#bottom";
    };
</script>


</body>
</html>
