<?php

include_once '../model/Post.php';
include_once '../controlleur/PostC.php';

$error = "";


if (isset($_POST['post'])) {
    $postC = new PostC(); 
    $cred = new Post(
        null,
        null,
        null,
        $_POST['post'],
        null,
        null,
        
    );

    $postC->InsertPost($cred);
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


    
    $messages = $postC->getMessages();

    foreach ($messages as $message) {
       
        echo '<p>' . $message['texte'] . '</p>';
        



        echo '<form method="post" action="">';
        echo '<input type="hidden" name="delete" value="' . $message['id'] . '">';
        echo '<input type="submit" value="Supprimer">';
        echo '</form>';

        


        echo '<form method="post" action="">';
        echo '<input type="hidden" name="update" value="' . $message['id'] . '">';
        echo '<input type="text" name="updated_text" placeholder="Nouveau texte">';
        echo '<input type="submit" value="Mettre à jour">';
        echo '</form>';

        
    }




?>
