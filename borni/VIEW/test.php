<?php
include_once '../MODEL/Comment.php';
include_once '../CONTROLLEUR/CommentS.php';

$error = ""; // Initialize error message variable

$commentsController = new CommentC();

if (isset($_POST['post'])) {
    $newComment = new Comment(
        null,
        $_POST['post'],
        null,
    );

    $commentsController->insertComment($newComment);
}

if (isset($_POST['delete'])) {
    $postIdToDelete = $_POST['delete'];
    $commentToDelete = new Comment($postIdToDelete, 255,null,null,null);
    $commentsController->deleteComment($commentToDelete);
}

if (isset($_POST['update'])) {
    $postIdToUpdate = $_POST['update'];
    $updatedText = $_POST['updated_text'];

    $commentToUpdate = new Comment($postIdToUpdate, $updatedText, null);
    $commentsController->updateComment($commentToUpdate);
}

$commentsController = new CommentC();

$messages = $commentsController->getComments();

foreach ($messages as $message) {
    echo '<!DOCTYPE html>';
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