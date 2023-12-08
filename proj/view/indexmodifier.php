<?php
include_once '../model/Post.php';
include_once '../controlleur/PostC.php';




$updateId = isset($_GET['update']) ? $_GET['update'] : null;



$postC = new PostC();

$messages = $postC->getMessages();


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexmodifier.css">
    <title>Modifier le Post</title>
</head>

<body>

    <h2>Modifier le Post</h2>

    <!-- formulaire_modification.php -->
    <form method="post" action="index.php" enctype="multipart/form-data" class="post-form">
        <select name="update" id="update">
            <?php
            foreach ($messages as $message) {
                echo "<option value='{$updateId}'>{$updateId}</option>";
            }
            ?>
        </select>
        <br>
        <label for="updated_text">Nouveau texte :</label>
        <input type="text" id="updated_text" name="updated_text" class="form-input">
        <br>
        <label for="updated_image">Nouvelle image :</label>
        <input type="file" id="updated_image" name="updated_image" accept="image/*" class="form-input">
        <br>
        <label for="updated_video">Nouvelle vidéo :</label>
        <input type="file" id="updated_video" name="updated_video" accept="video/*" class="form-input">
        <br>
        <input type="submit" value="Mettre à jour le Post" class="form-btn">
    </form>

    <p><a href="index.php">Retour aux Posts</a></p>

</body>

</html>
